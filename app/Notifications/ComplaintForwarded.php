<?php

namespace App\Notifications;

use App\Models\Complaint;
use Illuminate\Notifications\Notification;

class ComplaintForwarded extends Notification
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
            'department_name' => $this->complaint->department?->name,
            'message' => "သင့်တိုင်ကြားစာ \"{$this->complaint->title}\" ကို {$this->complaint->department?->name} ဌာနသို့ လွှဲပြောင်းလိုက်ပါပြီ။",
        ];
    }
}
