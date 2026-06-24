<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'judul' => fake()->sentence(4),
            'konten' => fake()->paragraphs(3, true),
        ];
    }
}
