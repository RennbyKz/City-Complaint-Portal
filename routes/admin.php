<?php

use App\Http\Controllers\Admin\CitizenController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\OfficerController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('dashboard/chart-data', [DashboardController::class, 'chartData'])->name('dashboard.chart-data');

Route::resource('departments', DepartmentController::class)->only(['index', 'create', 'store', 'edit', 'update']);
Route::resource('officers', OfficerController::class)->parameters(['officers' => 'officer'])->only(['index', 'create', 'store', 'edit', 'update']);

Route::get('citizens', [CitizenController::class, 'index'])->name('citizens.index');
Route::patch('citizens/{citizen}/approve', [CitizenController::class, 'approve'])->name('citizens.approve');
Route::patch('citizens/{citizen}/reject', [CitizenController::class, 'reject'])->name('citizens.reject');
Route::patch('citizens/{citizen}/block', [CitizenController::class, 'block'])->name('citizens.block');
Route::patch('citizens/{citizen}/unblock', [CitizenController::class, 'unblock'])->name('citizens.unblock');

Route::get('complaints', [ComplaintController::class, 'index'])->name('complaints.index');
Route::get('complaints/{complaint}', [ComplaintController::class, 'show'])->name('complaints.show');
Route::patch('complaints/{complaint}/forward', [ComplaintController::class, 'forward'])->name('complaints.forward');

Route::get('reports/monthly', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/monthly/download', [ReportController::class, 'download'])->name('reports.download');
