<?php

namespace App\Http\Controllers\Department;

use App\Enums\ComplaintStatus;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    public function index(Request $request): View
    {
        $departmentId = auth()->user()->department_id;

        $complaints = Complaint::query()
            ->where('department_id', $departmentId)
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->string('status')))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('department.complaints.index', [
            'complaints' => $complaints,
            'statuses' => ComplaintStatus::cases(),
        ]);
    }

    public function show(Complaint $complaint): View
    {
        $this->authorize('view', $complaint);

        $complaint->load(['user', 'statusLogs.changedBy', 'rating']);

        return view('department.complaints.show', ['complaint' => $complaint]);
    }

    public function start(Complaint $complaint): RedirectResponse
    {
        $this->authorize('update', $complaint);

        abort_unless($complaint->status === ComplaintStatus::Pending, 422);

        $complaint->update(['status' => ComplaintStatus::InProgress]);

        return back()->with('status', __('တိုင်ကြားစာကို ဆောင်ရွက်နေဆဲအဖြစ် ပြောင်းလဲလိုက်ပါပြီ။'));
    }

    public function resolve(Request $request, Complaint $complaint): RedirectResponse
    {
        $this->authorize('update', $complaint);

        abort_unless($complaint->status === ComplaintStatus::InProgress, 422);

        $validated = $request->validate([
            'resolution_photo' => ['required', 'image', 'max:5120'],
        ]);

        $path = $request->file('resolution_photo')->store('resolutions', 'public');

        $complaint->update([
            'status' => ComplaintStatus::Resolved,
            'resolution_photo_path' => $path,
            'resolved_at' => now(),
        ]);

        return back()->with('status', __('တိုင်ကြားစာကို ပြင်ဆင်ပြီးစီးကြောင်း သတ်မှတ်လိုက်ပါပြီ။'));
    }
}
