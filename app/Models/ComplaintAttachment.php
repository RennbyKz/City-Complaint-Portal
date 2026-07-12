<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['complaint_id', 'path', 'type', 'sort_order'])]
class ComplaintAttachment extends Model
{
    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class);
    }

    public function isVideo(): bool
    {
        return $this->type === 'video';
    }

    public function isPhoto(): bool
    {
        return $this->type === 'photo';
    }
}
