<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ComplaintStatus;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroup;
use App\Models\Complaint;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    public function index(Request $request): View
    {
        $complaints = Complaint::query()
            ->with(['user', 'department', 'category', 'attachments', 'statusLogs'])
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->when($request->filled('department_id'), fn ($q) => $q->where('department_id', $request->integer('department_id')))
            ->when($request->filled('category_id'), fn ($q) => $q->where('category_id', $request->integer('category_id')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.complaints.index', [
            'complaints' => $complaints,
            'departments' => Department::orderBy('name')->get(),
            'categoryGroups' => CategoryGroup::with('categories')->orderBy('sort_order')->get(),
            'statuses' => ComplaintStatus::cases(),
        ]);
    }

    public function show(Complaint $complaint): View
    {
        $complaint->load(['user', 'department', 'category', 'attachments', 'statusLogs.changedBy', 'rating']);

        return view('admin.complaints.show', [
            'complaint' => $complaint,
            'departments' => Department::orderBy('name')->get(),
        ]);
    }

    public function forward(Request $request, Complaint $complaint): RedirectResponse
    {
        $validated = $request->validate([
            'department_id' => ['required', 'exists:departments,id'],
        ]);

        $complaint->update(['department_id' => $validated['department_id']]);

        return back()->with('status', __('တိုင်ကြားစာကို ဌာနသို့ လွှဲပြောင်းလိုက်ပါပြီ။'));
    }
}
