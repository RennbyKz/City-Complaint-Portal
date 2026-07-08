<?php

namespace App\Http\Controllers\Citizen;

use App\Enums\ComplaintStatus;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Complaint $complaint): RedirectResponse
    {
        $this->authorize('view', $complaint);

        abort_unless($complaint->status === ComplaintStatus::Resolved, 422);
        abort_if($complaint->rating()->exists(), 422, 'ဤတိုင်ကြားစာကို အဆင့်သတ်မှတ်ပြီးဖြစ်ပါသည်။');

        $validated = $request->validate([
            'score' => ['required', 'integer', 'min:1', 'max:5'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        $complaint->rating()->create([
            'user_id' => auth()->id(),
            'score' => $validated['score'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('status', 'ကျေနပ်မှုအဆင့် သတ်မှတ်ပေးမှု အတွက် ကျေးဇူးတင်ပါသည်။');
    }
}
