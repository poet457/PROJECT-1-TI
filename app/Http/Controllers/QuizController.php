<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class QuizController extends Controller
{
    /**
     * Tampilkan form kuis untuk kursus yang sedang diikuti.
     */
    public function create(Enrollment $enrollment): Response
    {
        abort_if($enrollment->user_id !== Auth::id(), 403);

        if ($enrollment->sudah_selesai) {
            return redirect()
                ->route('enrollments.show', $enrollment)
                ->with('error', 'Masa akses paket ini sudah habis. Daftar ulang paket untuk mengerjakan kuis lagi.');
        }

        $enrollment->load('course.questions', 'quizAnswers');

        if ($enrollment->course->questions->isEmpty()) {
            return redirect()
                ->route('enrollments.show', $enrollment)
                ->with('info', 'Kursus ini belum memiliki soal kuis.');
        }

        // Jawaban yang sudah pernah diisi sebelumnya (kalau ini pengulangan).
        $jawabanSebelumnya = $enrollment->quizAnswers()
            ->pluck('jawaban_dipilih', 'question_id');

        return Inertia::render('Quiz/Create', [
            'enrollment' => [
                'id' => $enrollment->id,
                'course' => [
                    'nama_kursus' => $enrollment->course->nama_kursus,
                    'kategori' => $enrollment->course->kategori,
                ],
            ],
            'questions' => $enrollment->course->questions
                ->values()
                ->map(fn ($question) => [
                    'id' => $question->id,
                    'pertanyaan' => $question->pertanyaan,
                    'options' => [
                        'a' => $question->pilihan_a,
                        'b' => $question->pilihan_b,
                        'c' => $question->pilihan_c,
                        'd' => $question->pilihan_d,
                    ],
                ]),
            'jawabanSebelumnya' => $jawabanSebelumnya,
        ]);
    }

    /**
     * Simpan jawaban kuis, hitung nilai, lalu simpan ke enrollment.
     */
    public function store(Request $request, Enrollment $enrollment)
    {
        abort_if($enrollment->user_id !== Auth::id(), 403);

        if ($enrollment->sudah_selesai) {
            return redirect()
                ->route('enrollments.show', $enrollment)
                ->with('error', 'Masa akses paket ini sudah habis. Daftar ulang paket untuk mengirim jawaban kuis.');
        }

        $enrollment->load('course.questions');
        $questions = $enrollment->course->questions;

        $request->validate([
            'jawaban' => ['required', 'array'],
            'jawaban.*' => ['required', 'in:a,b,c,d'],
        ]);

        foreach ($questions as $question) {
            $dipilih = $request->input("jawaban.{$question->id}");

            if (! $dipilih) {
                continue;
            }

            $enrollment->quizAnswers()->updateOrCreate(
                ['question_id' => $question->id],
                [
                    'jawaban_dipilih' => $dipilih,
                    'is_benar' => $dipilih === $question->jawaban_benar,
                ]
            );
        }

        $nilai = $enrollment->hitungNilai();

        return redirect()
            ->route('enrollments.show', $enrollment)
            ->with('success', "Kuis selesai dikerjakan! Nilai kamu: {$nilai}.");
    }
}
