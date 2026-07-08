<?php

namespace App\Notifications;

use App\Models\Complaint;
use Illuminate\Notifications\Notification;

class ComplaintResolved extends Notification
{
    public function __construct(protected Complaint $complaint)
    {
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'complaint_id' => $this->complaint->id,
            'title' => $this->complaint->title,
            'message' => "သင့်တိုင်ကြားစာ \"{$this->complaint->title}\" ကို ပြင်ဆင်ပြီးစီးပါပြီ။ ကျေနပ်မှုအဆင့် ပေးပါ။",
        ];
    }
}
