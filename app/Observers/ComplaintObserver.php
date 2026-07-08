<?php

namespace App\Observers;

use App\Enums\ComplaintStatus;
use App\Models\Complaint;
use App\Models\StatusLog;
use App\Notifications\ComplaintForwarded;
use App\Notifications\ComplaintResolved;

class ComplaintObserver
{
    public function created(Complaint $complaint): void
    {
        StatusLog::create([
            'complaint_id' => $complaint->id,
            'status' => ComplaintStatus::Pending,
            'changed_by' => $complaint->user_id,
        ]);
    }

    public function updated(Complaint $complaint): void
    {
        if ($complaint->wasChanged('department_id') && $complaint->department_id !== null) {
            StatusLog::create([
                'complaint_id' => $complaint->id,
                'status' => $complaint->status,
                'notes' => $complaint->department->name,
                'changed_by' => auth()->id(),
            ]);

            $complaint->user->notify(new ComplaintForwarded($complaint));
        }

        if ($complaint->wasChanged('status')) {
            if ($complaint->status === ComplaintStatus::InProgress) {
                StatusLog::create([
                    'complaint_id' => $complaint->id,
                    'status' => ComplaintStatus::InProgress,
                    'changed_by' => auth()->id(),
                ]);
            }

            if ($complaint->status === ComplaintStatus::Resolved) {
                StatusLog::create([
                    'complaint_id' => $complaint->id,
                    'status' => ComplaintStatus::Resolved,
                    'changed_by' => auth()->id(),
                ]);

                $complaint->user->notify(new ComplaintResolved($complaint));
            }
        }
    }
}
