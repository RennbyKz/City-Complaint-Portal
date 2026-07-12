<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'pending' => Complaint::pending()->count(),
            'in_progress' => Complaint::inProgress()->count(),
            'resolved' => Complaint::resolved()->count(),
            'unassigned' => Complaint::whereNull('department_id')->count(),
            'pending_citizens' => User::where('role', UserRole::Citizen)->where('status', UserStatus::Pending)->count(),
        ];

        return view('admin.dashboard', ['stats' => $stats]);
    }

    public function chartData(): JsonResponse
    {
        $volumeByMonth = Complaint::query()
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as total")
            ->where('created_at', '>=', now()->subMonths(11)->startOfMonth())
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $isEnglish = app()->getLocale() === 'en';

        $byCategory = Complaint::query()
            ->join('categories', 'categories.id', '=', 'complaints.category_id')
            ->join('category_groups', 'category_groups.id', '=', 'categories.category_group_id')
            ->selectRaw('category_groups.id, category_groups.name, category_groups.name_en, COUNT(*) as total')
            ->groupBy('category_groups.id', 'category_groups.name', 'category_groups.name_en')
            ->orderBy('category_groups.id')
            ->get()
            ->map(fn ($row) => [
                'category' => $row->id,
                'label' => $isEnglish && $row->name_en ? $row->name_en : $row->name,
                'total' => $row->total,
            ]);

        return response()->json([
            'volumeByMonth' => $volumeByMonth,
            'byCategory' => $byCategory,
        ]);
    }
}
