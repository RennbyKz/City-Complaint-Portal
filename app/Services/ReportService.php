<?php

namespace App\Services;

use App\Models\CategoryGroup;
use App\Models\Complaint;
use App\Models\Department;
use Illuminate\Support\Collection;

class ReportService
{
    public function monthlyDepartmentStats(int $year, int $month): Collection
    {
        return Department::all()->map(function (Department $department) use ($year, $month) {
            $totalReceived = $department->complaints()
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $resolvedInRange = $department->complaints()
                ->whereYear('resolved_at', $year)
                ->whereMonth('resolved_at', $month);

            $totalResolved = (clone $resolvedInRange)->count();

            $avgResolutionHours = (clone $resolvedInRange)
                ->selectRaw('AVG(TIMESTAMPDIFF(HOUR, created_at, resolved_at)) as avg_hours')
                ->value('avg_hours');

            $avgRating = $department->averageSatisfaction($year, $month);

            $ratingCount = $department->complaints()
                ->whereHas('rating')
                ->whereYear('resolved_at', $year)
                ->whereMonth('resolved_at', $month)
                ->count();

            return (object) [
                'department' => $department,
                'total_received' => $totalReceived,
                'total_resolved' => $totalResolved,
                'avg_resolution_hours' => $avgResolutionHours,
                'avg_rating' => $avgRating,
                'rating_count' => $ratingCount,
            ];
        });
    }

    public function categoryBreakdown(int $year, int $month): Collection
    {
        $isEnglish = app()->getLocale() === 'en';

        $counts = Complaint::query()
            ->join('categories', 'categories.id', '=', 'complaints.category_id')
            ->whereYear('complaints.created_at', $year)
            ->whereMonth('complaints.created_at', $month)
            ->selectRaw('categories.category_group_id, COUNT(*) as total')
            ->groupBy('categories.category_group_id')
            ->pluck('total', 'category_group_id');

        return CategoryGroup::orderBy('sort_order')
            ->get()
            ->map(fn (CategoryGroup $group) => (object) [
                'label' => $isEnglish && $group->name_en ? $group->name_en : $group->name,
                'total' => $counts->get($group->id, 0),
            ]);
    }

    public function summary(int $year, int $month): object
    {
        return (object) [
            'total_received' => Complaint::whereYear('created_at', $year)->whereMonth('created_at', $month)->count(),
            'total_resolved' => Complaint::whereYear('resolved_at', $year)->whereMonth('resolved_at', $month)->count(),
        ];
    }
}
