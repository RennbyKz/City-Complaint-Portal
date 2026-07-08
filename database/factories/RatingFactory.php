<?php

namespace Database\Factories;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Rating>
 */
class RatingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'score' => fake()->numberBetween(1, 5) >= 2 ? fake()->numberBetween(3, 5) : fake()->numberBetween(1, 2),
            'comment' => fake()->boolean(50) ? fake()->sentence() : null,
        ];
    }
}
