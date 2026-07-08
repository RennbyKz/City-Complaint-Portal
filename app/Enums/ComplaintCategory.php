<?php

namespace App\Enums;

enum ComplaintCategory: string
{
    case Road = 'road';
    case Streetlight = 'streetlight';
    case Drainage = 'drainage';
    case WasteManagement = 'waste_management';
    case WaterSupply = 'water_supply';
    case Electricity = 'electricity';
    case Other = 'other';

    public function label(): string
    {
        return match ($this) {
            self::Road => 'လမ်းပန်းဆက်သွယ်ရေး',
            self::Streetlight => 'လမ်းမီးတိုင်',
            self::Drainage => 'မိလ္လာစနစ်',
            self::WasteManagement => 'အမှိုက်ပုံ',
            self::WaterSupply => 'ရေရရှိမှု',
            self::Electricity => 'လျှပ်စစ်',
            self::Other => 'အခြား',
        };
    }
}
