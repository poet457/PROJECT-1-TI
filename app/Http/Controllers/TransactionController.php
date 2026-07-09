<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Daftar/"beli" sebuah kursus. Karena belum ada payment gateway,
     * transaksi langsung ditandai sukses dan enrollment langsung dibuat
     * dengan masa belajar 30 hari sejak sekarang.
     */
    public function store(Course $course)
    {
        $user = Auth::user();

        $sudahTerdaftar = Enrollment::where('user_id', $user->id)
            ->where('course_id', $course->id)
            ->where('ends_at', '>', now())
            ->exists();

        if ($sudahTerdaftar) {
            return redirect()
                ->route('courses.index')
                ->with('info', 'Kamu sudah terdaftar di kursus ini. Lanjutkan belajar lewat menu "Kelas Saya".');
        }

        $enrollment = DB::transaction(function () use ($user, $course) {
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'status' => 'success',
            ]);

            return Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'transaction_id' => $transaction->id,
                'started_at' => now(),
                'ends_at' => now()->addDays(30),
            ]);
        });

        return redirect()
            ->route('enrollments.show', $enrollment)
            ->with('success', 'Berhasil daftar kursus "'.$course->nama_kursus.'". Selamat belajar!');
    }
}
