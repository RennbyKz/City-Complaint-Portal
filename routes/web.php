<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('home');
});

Route::get('/locale/{locale}', function (string $locale) {
    abort_unless(in_array($locale, ['en', 'my'], true), 404);

    session(['locale' => $locale]);

    return redirect()->back()->cookie('locale', $locale, 60 * 24 * 365);
})->name('locale.switch');

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'active', 'role:citizen'])->prefix('citizen')->as('citizen.')
    ->group(base_path('routes/citizen.php'));

Route::middleware(['auth', 'active', 'role:admin'])->prefix('admin')->as('admin.')
    ->group(base_path('routes/admin.php'));

Route::middleware(['auth', 'active', 'role:department'])->prefix('department')->as('department.')
    ->group(base_path('routes/department.php'));

require __DIR__.'/auth.php';
