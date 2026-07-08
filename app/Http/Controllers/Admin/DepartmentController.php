<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        return view('admin.departments.index', ['departments' => Department::withCount(['users', 'complaints'])->orderBy('name')->get()]);
    }

    public function create(): View
    {
        return view('admin.departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(['name' => ['required', 'string', 'max:255']]);

        Department::create($validated);

        return redirect()->route('admin.departments.index')->with('status', __('ဌာနအသစ် ဖန်တီးပြီးပါပြီ။'));
    }

    public function edit(Department $department): View
    {
        return view('admin.departments.edit', ['department' => $department]);
    }

    public function update(Request $request, Department $department): RedirectResponse
    {
        $validated = $request->validate(['name' => ['required', 'string', 'max:255']]);

        $department->update($validated);

        return redirect()->route('admin.departments.index')->with('status', __('ဌာန အချက်အလက် ပြင်ဆင်ပြီးပါပြီ။'));
    }
}
