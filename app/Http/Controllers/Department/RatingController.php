<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\View\View;

class RatingController extends Controller
{
    public function index(): View
    {
        $department = auth()->user()->department;

        $averageRating = $department?->averageSatisfaction();

        $recentRatings = $department
            ? Rating::whereHas('complaint', fn ($q) => $q->where('department_id', $department->id))
                ->with(['complaint', 'user'])
                ->latest()
                ->take(20)
                ->get()
            : collect();

        return view('department.ratings.index', [
            'department' => $department,
            'averageRating' => $averageRating,
            'recentRatings' => $recentRatings,
        ]);
    }
}
