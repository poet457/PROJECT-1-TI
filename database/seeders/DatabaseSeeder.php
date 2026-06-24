<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Material;
use App\Models\Transaction;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun untuk login & testing cepat.
        $testUser = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 5 user yang menjadi tutor, masing-masing punya profil Tutor.
        $tutors = Tutor::factory(5)
            ->for(User::factory())
            ->create();

        // 8 kursus, dibagi rata ke tutor-tutor di atas.
        $courses = collect(range(1, 8))->map(function (int $i) use ($tutors) {
            return Course::factory()->create([
                'tutor_id' => $tutors->random()->id,
            ]);
        });

        // Setiap kursus punya 2-4 materi pembelajaran.
        $courses->each(function (Course $course) {
            Material::factory(fake()->numberBetween(2, 4))->create([
                'course_id' => $course->id,
            ]);
        });

        // 15 user sebagai siswa, masing-masing membeli 1-2 kursus.
        $students = User::factory(15)->create();

        $students->each(function (User $student) use ($courses) {
            $courses->random(fake()->numberBetween(1, 2))->each(function (Course $course) use ($student) {
                Transaction::factory()->create([
                    'user_id' => $student->id,
                    'course_id' => $course->id,
                    'status' => fake()->randomElement(['pending', 'success', 'success', 'failed']),
                ]);
            });
        });

        // Tambahan transaksi dari test user, biar saat login dengan akun
        // test@example.com langsung kelihatan ada riwayat transaksi.
        Transaction::factory()->success()->create([
            'user_id' => $testUser->id,
            'course_id' => $courses->random()->id,
        ]);
    }
}
