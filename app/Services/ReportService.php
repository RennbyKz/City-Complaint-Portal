<?php

namespace App\Services;

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
}
