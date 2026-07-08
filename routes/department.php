<?php

use App\Http\Controllers\Department\ComplaintController;
use App\Http\Controllers\Department\DashboardController;
use App\Http\Controllers\Department\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints.index');
Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
Route::patch('complaints/{complaint}/start', [ComplaintController::class, 'start'])->name('complaints.start');
Route::patch('complaints/{complaint}/resolve', [ComplaintController::class, 'resolve'])->name('complaints.resolve');

Route::get('ratings', [RatingController::class, 'index'])->name('ratings.index');
