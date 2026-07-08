<?php

namespace App\Enums;

enum ComplaintStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Resolved = 'resolved';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'စောင့်ဆိုင်းဆဲ',
            self::InProgress => 'ဆောင်ရွက်နေဆဲ',
            self::Resolved => 'ပြီးစီးပြီ',
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::Pending => 'bg-amber-100 text-amber-800',
            self::InProgress => 'bg-blue-100 text-blue-800',
            self::Resolved => 'bg-green-100 text-green-800',
        };
    }
}
