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
            self::Road => __('လမ်းပန်းဆက်သွယ်ရေး'),
            self::Streetlight => __('လမ်းမီးတိုင်'),
            self::Drainage => __('မိလ္လာစနစ်'),
            self::WasteManagement => __('အမှိုက်ပုံ'),
            self::WaterSupply => __('ရေရရှိမှု'),
            self::Electricity => __('လျှပ်စစ်'),
            self::Other => __('အခြား'),
        };
    }
}
