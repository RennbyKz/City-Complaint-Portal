<?php

namespace App\Enums;

enum UserStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Blocked = 'blocked';

    public function label(): string
    {
        return match ($this) {
            self::Pending => __('အတည်ပြုရန်စောင့်နေ'),
            self::Active => __('အသက်ဝင်နေသော'),
            self::Blocked => __('ပိတ်ထားသော'),
        };
    }
}
