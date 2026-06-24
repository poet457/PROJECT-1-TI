<?php

namespace Database\Factories;

use App\Models\Tutor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tutor_id' => Tutor::factory(),
            'nama_kursus' => fake()->randomElement([
                'Belajar Laravel dari Nol',
                'Dasar-Dasar UI/UX Design',
                'Python untuk Data Science',
                'Membuat Aplikasi Mobile dengan Flutter',
                'Strategi Digital Marketing',
                'Speaking English Confidently',
                'JavaScript Modern (ES6+)',
                'Belajar React.js untuk Pemula',
            ]),
            'kategori' => fake()->randomElement([
                'Programming', 'Design', 'Data Science', 'Marketing', 'Bahasa',
            ]),
            'harga' => fake()->numberBetween(50, 300) * 1000,
            'deskripsi' => fake()->paragraph(3),
        ];
    }
}
