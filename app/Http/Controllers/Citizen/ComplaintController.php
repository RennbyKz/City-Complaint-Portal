<?php

namespace App\Http\Controllers\Citizen;

use App\Enums\ComplaintCategory;
use App\Enums\ComplaintStatus;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    public function index(): View
    {
        $complaints = auth()->user()->complaints()->latest()->paginate(10);

        return view('citizen.complaints.index', ['complaints' => $complaints]);
    }

    public function create(): View
    {
        return view('citizen.complaints.create', ['categories' => ComplaintCategory::cases()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['required', new Enum(ComplaintCategory::class)],
            'location' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'max:5120'],
        ]);

        $photoPath = $request->hasFile('photo')
            ? $request->file('photo')->store('complaints', 'public')
            : null;

        $complaint = auth()->user()->complaints()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'location' => $validated['location'],
            'photo_path' => $photoPath,
            'status' => ComplaintStatus::Pending,
        ]);

        return redirect()->route('citizen.complaints.show', $complaint)
            ->with('status', 'တိုင်ကြားစာ တင်သွင်းပြီးပါပြီ။');
    }

    public function show(Complaint $complaint): View
    {
        $this->authorize('view', $complaint);

        $complaint->load(['department', 'statusLogs.changedBy', 'rating']);

        return view('citizen.complaints.show', ['complaint' => $complaint]);
    }
}
