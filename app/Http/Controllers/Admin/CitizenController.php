<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CitizenController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->string('status')->toString() ?: null;

        $citizens = User::query()
            ->where('role', UserRole::Citizen)
            ->when($status, fn ($q) => $q->where('status', $status))
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.citizens.index', ['citizens' => $citizens, 'status' => $status]);
    }

    public function approve(User $citizen): RedirectResponse
    {
        $citizen->update(['status' => UserStatus::Active]);

        return back()->with('status', "{$citizen->name} ၏ အကောင့်ကို အတည်ပြုလိုက်ပါပြီ။");
    }

    public function reject(User $citizen): RedirectResponse
    {
        $citizen->update(['status' => UserStatus::Blocked]);

        return back()->with('status', "{$citizen->name} ၏ အကောင့်ကို ငြင်းပယ်လိုက်ပါပြီ။");
    }

    public function block(User $citizen): RedirectResponse
    {
        $citizen->update(['status' => UserStatus::Blocked]);

        return back()->with('status', "{$citizen->name} ၏ အကောင့်ကို ပိတ်လိုက်ပါပြီ။");
    }

    public function unblock(User $citizen): RedirectResponse
    {
        $citizen->update(['status' => UserStatus::Active]);

        return back()->with('status', "{$citizen->name} ၏ အကောင့်ကို ပြန်ဖွင့်ပေးလိုက်ပါပြီ။");
    }
}
