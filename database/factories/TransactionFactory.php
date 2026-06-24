<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'course_id' => Course::factory(),
            'status' => fake()->randomElement(['pending', 'success', 'failed']),
        ];
    }

    public function success(): static
    {
        return $this->state(fn () => ['status' => 'success']);
    }
}
