<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Daftar semua kursus yang sedang/sudah diikuti user yang login ("Kelas Saya").
     */
    public function index()
    {
        $enrollments = Auth::user()
            ->enrollments()
            ->with(['course.tutor.user'])
            ->latest()
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Halaman detail kursus yang sedang berjalan: materi, info kursus,
     * sisa waktu, nilai, dan akses kuis/sertifikat.
     */
    public function show(Enrollment $enrollment)
    {
        abort_if($enrollment->user_id !== Auth::id(), 403);

        $enrollment->load([
            'course.tutor.user',
            'course.materials',
            'course.questions',
        ]);

        return view('enrollments.show', compact('enrollment'));
    }
}
