<?php

namespace Database\Factories;

use App\Enums\ComplaintCategory;
use App\Enums\ComplaintStatus;
use App\Models\Complaint;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Complaint>
 */
class ComplaintFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->citizen()->active(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'category' => fake()->randomElement(ComplaintCategory::cases())->value,
            'location' => fake()->streetAddress(),
            'status' => ComplaintStatus::Pending->value,
            'created_at' => fake()->dateTimeBetween('-11 months', 'now'),
        ];
    }

    public function forwarded(): static
    {
        return $this->state(fn () => ['department_id' => Department::inRandomOrder()->first()?->id]);
    }

    public function inProgress(): static
    {
        return $this->forwarded()->state(fn () => ['status' => ComplaintStatus::InProgress->value]);
    }

    public function resolved(): static
    {
        return $this->inProgress()->state(function (array $attributes) {
            $resolvedAt = fake()->dateTimeBetween($attributes['created_at'], 'now');

            return [
                'status' => ComplaintStatus::Resolved->value,
                'resolved_at' => $resolvedAt,
            ];
        });
    }
}
