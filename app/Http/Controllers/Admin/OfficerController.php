<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class OfficerController extends Controller
{
    public function index(): View
    {
        $officers = User::with('department')->where('role', UserRole::Department)->orderBy('name')->paginate(15);

        return view('admin.officers.index', ['officers' => $officers]);
    }

    public function create(): View
    {
        return view('admin.officers.create', ['departments' => Department::orderBy('name')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'department_id' => ['required', 'exists:departments,id'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'department_id' => $validated['department_id'],
            'password' => Hash::make($validated['password']),
            'role' => UserRole::Department,
            'status' => UserStatus::Active,
        ]);

        return redirect()->route('admin.officers.index')->with('status', __('ဌာနဝန်ထမ်း အကောင့်အသစ် ဖန်တီးပြီးပါပြီ။'));
    }

    public function edit(User $officer): View
    {
        return view('admin.officers.edit', ['officer' => $officer, 'departments' => Department::orderBy('name')->get()]);
    }

    public function update(Request $request, User $officer): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        $officer->update($validated);

        return redirect()->route('admin.officers.index')->with('status', __('ဌာနဝန်ထမ်း အချက်အလက် ပြင်ဆင်ပြီးပါပြီ။'));
    }
}
