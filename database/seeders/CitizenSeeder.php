<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CitizenSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->citizen()->active()->create([
            'name' => 'Citizen',
            'email' => 'citizen@example.com',
        ]);

        User::factory()->citizen()->pending()->create([
            'name' => 'Pending Citizen',
            'email' => 'pending@example.com',
        ]);

        User::factory()->citizen()->active()->count(12)->create();
        User::factory()->citizen()->pending()->count(3)->create();
        User::factory()->citizen()->blocked()->count(2)->create();
    }
}
