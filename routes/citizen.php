<?php

use App\Http\Controllers\Citizen\ComplaintController;
use App\Http\Controllers\Citizen\DashboardController;
use App\Http\Controllers\Citizen\NotificationController;
use App\Http\Controllers\Citizen\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('complaints', ComplaintController::class)->only(['index', 'create', 'store', 'show']);
Route::post('complaints/{complaint}/rating', [RatingController::class, 'store'])->name('complaints.rating.store');

Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::patch('notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.read');
