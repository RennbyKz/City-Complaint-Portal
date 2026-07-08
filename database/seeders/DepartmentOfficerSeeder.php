<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentOfficerSeeder extends Seeder
{
    public function run(): void
    {
        Department::all()->each(function (Department $department, int $index) {
            User::factory()->departmentOfficer($department)->create([
                'name' => "{$department->name} အရာရှိ",
                'email' => "officer{$index}@example.com",
            ]);
        });
    }
}
