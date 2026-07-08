<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use Illuminate\Http\RedirectResponse;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        return match (auth()->user()->role) {
            UserRole::Citizen => redirect()->route('citizen.dashboard'),
            UserRole::Admin => redirect()->route('admin.dashboard'),
            UserRole::Department => redirect()->route('department.dashboard'),
        };
    }
}
