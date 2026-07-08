<?php

namespace App\Models;

use App\Enums\ComplaintCategory;
use App\Enums\ComplaintStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'title',
    'description',
    'category',
    'location',
    'photo_path',
    'status',
    'department_id',
    'resolution_photo_path',
    'resolved_at',
])]
class Complaint extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'status' => ComplaintStatus::class,
            'category' => ComplaintCategory::class,
            'resolved_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function statusLogs(): HasMany
    {
        return $this->hasMany(StatusLog::class)->orderBy('created_at');
    }

    public function rating(): HasOne
    {
        return $this->hasOne(Rating::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', ComplaintStatus::Pending);
    }

    public function scopeInProgress($query)
    {
        return $query->where('status', ComplaintStatus::InProgress);
    }

    public function scopeResolved($query)
    {
        return $query->where('status', ComplaintStatus::Resolved);
    }

    public function scopeForDepartment($query, int $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    public function agingSince(): \Illuminate\Support\Carbon
    {
        return $this->statusLogs->where('status', $this->status)->last()?->created_at ?? $this->created_at;
    }

    public function agingHours(): float
    {
        return $this->agingSince()->diffInHours(now());
    }

    public function agingLevel(): string
    {
        $hours = $this->agingHours();

        return match (true) {
            $hours < 24 => 'good',
            $hours < 72 => 'warning',
            default => 'critical',
        };
    }
}
