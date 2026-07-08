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
            self::Pending => __('စောင့်ဆိုင်းဆဲ'),
            self::InProgress => __('ဆောင်ရွက်နေဆဲ'),
            self::Resolved => __('ပြီးစီးပြီ'),
        };
    }

    public function badgeClass(): string
    {
        return match ($this) {
            self::Pending => 'bg-amber-100 text-amber-800 dark:bg-amber-900/40 dark:text-amber-300',
            self::InProgress => 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300',
            self::Resolved => 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300',
        };
    }
}
