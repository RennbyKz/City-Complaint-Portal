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

        $byCategory = Complaint::query()
            ->selectRaw('category, COUNT(*) as total')
            ->groupBy('category')
            ->get()
            ->map(fn ($row) => [
                'category' => $row->category->value,
                'label' => $row->category->label(),
                'total' => $row->total,
            ]);

        return response()->json([
            'volumeByMonth' => $volumeByMonth,
            'byCategory' => $byCategory,
        ]);
    }
}
