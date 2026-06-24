<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Tutor>
 */
class TutorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'keahlian' => fake()->randomElement([
                'Web Development',
                'UI/UX Design',
                'Data Science',
                'Mobile Development',
                'Digital Marketing',
                'Bahasa Inggris',
            ]),
            'harga' => fake()->numberBetween(50, 300) * 1000,
            'deskripsi' => fake()->sentence(15),
        ];
    }
}
