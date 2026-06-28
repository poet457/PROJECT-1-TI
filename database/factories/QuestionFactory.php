<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Question>
 *
 * Bank soal generik di bawah ini hanya placeholder fungsional untuk kursus
 * "isian" pada seeder. Untuk kursus sungguhan, ganti dengan soal yang
 * relevan dengan materi kursus tersebut.
 */
class QuestionFactory extends Factory
{
    public function definition(): array
    {
        $bank = [
            ['pertanyaan' => 'Berapa hasil dari 8 x 7?', 'pilihan_a' => '54', 'pilihan_b' => '56', 'pilihan_c' => '64', 'pilihan_d' => '48', 'jawaban_benar' => 'b'],
            ['pertanyaan' => 'Manakah planet terbesar di tata surya?', 'pilihan_a' => 'Bumi', 'pilihan_b' => 'Mars', 'pilihan_c' => 'Jupiter', 'pilihan_d' => 'Saturnus', 'jawaban_benar' => 'c'],
            ['pertanyaan' => "Apa kepanjangan dari 'HTTP'?", 'pilihan_a' => 'Hyper Text Transfer Protocol', 'pilihan_b' => 'High Transfer Text Protocol', 'pilihan_c' => 'Hyperlink Text Tool Protocol', 'pilihan_d' => 'Home Tool Transfer Protocol', 'jawaban_benar' => 'a'],
            ['pertanyaan' => '1 KB umumnya dibulatkan sama dengan berapa byte?', 'pilihan_a' => '100', 'pilihan_b' => '1000', 'pilihan_c' => '1024', 'pilihan_d' => '512', 'jawaban_benar' => 'c'],
            ['pertanyaan' => 'Manakah yang bukan termasuk bahasa pemrograman?', 'pilihan_a' => 'Python', 'pilihan_b' => 'JavaScript', 'pilihan_c' => 'Photoshop', 'pilihan_d' => 'PHP', 'jawaban_benar' => 'c'],
            ['pertanyaan' => 'Ibu kota Indonesia adalah?', 'pilihan_a' => 'Jakarta', 'pilihan_b' => 'Bandung', 'pilihan_c' => 'Medan', 'pilihan_d' => 'Surabaya', 'jawaban_benar' => 'a'],
            ['pertanyaan' => "Apa lawan kata dari 'maju'?", 'pilihan_a' => 'Cepat', 'pilihan_b' => 'Mundur', 'pilihan_c' => 'Tinggi', 'pilihan_d' => 'Besar', 'jawaban_benar' => 'b'],
            ['pertanyaan' => 'Manakah urutan satuan waktu dari kecil ke besar yang benar?', 'pilihan_a' => 'Menit, Detik, Jam', 'pilihan_b' => 'Detik, Menit, Jam', 'pilihan_c' => 'Jam, Detik, Menit', 'pilihan_d' => 'Menit, Jam, Detik', 'jawaban_benar' => 'b'],
        ];

        return fake()->randomElement($bank) + [
            'course_id' => Course::factory(),
        ];
    }
}
