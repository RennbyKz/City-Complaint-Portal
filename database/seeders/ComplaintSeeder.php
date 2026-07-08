<?php

namespace Database\Seeders;

use App\Models\Complaint;
use Illuminate\Database\Seeder;

class ComplaintSeeder extends Seeder
{
    public function run(): void
    {
        Complaint::factory()->count(15)->create();
        Complaint::factory()->forwarded()->count(10)->create();
        Complaint::factory()->inProgress()->count(10)->create();

        Complaint::factory()->resolved()->count(20)->create()->each(function (Complaint $complaint) {
            if (fake()->boolean(70)) {
                \App\Models\Rating::factory()->create([
                    'complaint_id' => $complaint->id,
                    'user_id' => $complaint->user_id,
                ]);
            }
        });
    }
}
