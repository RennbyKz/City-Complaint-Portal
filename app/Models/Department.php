<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'district', 'township'])]
class Department extends Model
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class);
    }

    public function averageSatisfaction(?int $year = null, ?int $month = null): ?float
    {
        $query = Rating::query()
            ->whereHas('complaint', function ($q) use ($year, $month) {
                $q->where('department_id', $this->id);

                if ($year !== null) {
                    $q->whereYear('resolved_at', $year);
                }

                if ($month !== null) {
                    $q->whereMonth('resolved_at', $month);
                }
            });

        return $query->avg('score');
    }
}
