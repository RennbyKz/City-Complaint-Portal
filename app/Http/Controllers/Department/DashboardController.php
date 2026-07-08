<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $department = $user->department;

        $statusCounts = $department
            ? $department->complaints()
                ->selectRaw('status, count(*) as total')
                ->groupBy('status')
                ->pluck('total', 'status')
            : collect();

        $averageRating = $department?->averageSatisfaction();

        return view('department.dashboard', [
            'department' => $department,
            'statusCounts' => $statusCounts,
            'averageRating' => $averageRating,
        ]);
    }
}
