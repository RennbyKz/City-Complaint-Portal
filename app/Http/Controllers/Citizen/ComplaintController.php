<?php

namespace App\Http\Controllers\Citizen;

use App\Enums\ComplaintStatus;
use App\Http\Controllers\Controller;
use App\Models\CategoryGroup;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    public function index(): View
    {
        $complaints = auth()->user()->complaints()->with('category')->latest()->paginate(10);

        return view('citizen.complaints.index', ['complaints' => $complaints]);
    }

    public function create(): View
    {
        $categoryGroups = CategoryGroup::with('categories')->orderBy('sort_order')->get();

        return view('citizen.complaints.create', ['categoryGroups' => $categoryGroups]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'attachments' => ['nullable', 'array', 'max:5'],
            'attachments.*' => ['file', 'mimes:jpg,jpeg,png,webp,mp4,mov,webm', 'max:51200'],
        ]);

        $complaint = auth()->user()->complaints()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'location' => $validated['location'],
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'status' => ComplaintStatus::Pending,
        ]);

        foreach ($request->file('attachments', []) as $index => $file) {
            /** @var UploadedFile $file */
            $isVideo = str_starts_with($file->getMimeType(), 'video/');

            $complaint->attachments()->create([
                'path' => $file->store('complaints', 'public'),
                'type' => $isVideo ? 'video' : 'photo',
                'sort_order' => $index,
            ]);
        }

        return redirect()->route('citizen.complaints.show', $complaint)
            ->with('status', __('တိုင်ကြားစာ တင်သွင်းပြီးပါပြီ။'));
    }

    public function show(Complaint $complaint): View
    {
        $this->authorize('view', $complaint);

        $complaint->load(['department', 'category', 'attachments', 'statusLogs.changedBy', 'rating']);

        return view('citizen.complaints.show', ['complaint' => $complaint]);
    }
}
