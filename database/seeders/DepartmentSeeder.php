<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['YCDC (ရန်ကုန်မြို့တော်စည်ပင်သာယာရေးကော်မတီ)', 'YESC (ရန်ကုန်လျှပ်စစ်ဓာတ်အားပေးရေးကော်ပိုရေးရှင်း)', 'ရေနှင့်သန့်ရှင်းရေးဌာန', 'အမှိုက်သိမ်းဆည်းရေးဌာန'] as $name) {
            Department::firstOrCreate(['name' => $name]);
        }
    }
}
