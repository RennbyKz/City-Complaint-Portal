<?php

namespace App\Http\Controllers\Citizen;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $statusCounts = $user->complaints()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status');

        $recentComplaints = $user->complaints()
            ->latest()
            ->take(5)
            ->get();

        return view('citizen.dashboard', [
            'statusCounts' => $statusCounts,
            'recentComplaints' => $recentComplaints,
        ]);
    }
}
