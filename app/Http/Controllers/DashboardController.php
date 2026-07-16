<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Material;
use App\Models\Question;
use App\Models\Transaction;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userEnrollments = $user->enrollments()
            ->with(['course.materials'])
            ->get();

        $quizDoneCount = $userEnrollments->whereNotNull('score')->count();
        $certificateAvailableCount = $userEnrollments->filter->bisa_unduh_sertifikat->count();
        $materialCount = $userEnrollments->sum(fn (Enrollment $enrollment) => $enrollment->course->materials->count());
        $progressPercent = $userEnrollments->count() > 0
            ? (int) round($userEnrollments->avg(function (Enrollment $enrollment) {
                $totalDays = $enrollment->started_at->diffInDays($enrollment->ends_at) ?: 30;
                $elapsedDays = min($totalDays, $enrollment->started_at->diffInDays(now()));
                $timeProgress = ($elapsedDays / $totalDays) * 50;
                $quizProgress = $enrollment->sudah_mengerjakan_kuis ? 30 : 0;
                $certificateProgress = $enrollment->bisa_unduh_sertifikat ? 20 : 0;

                return min(100, $timeProgress + $quizProgress + $certificateProgress);
            }))
            : 0;

        $stats = [
            'kursus'    => Course::count(),
            'tutor'     => Tutor::count(),
            'siswa'     => User::count(),
            'transaksi' => Transaction::count(),
            'materi' => Material::count(),
            'soal' => Question::count(),
            'sertifikat' => Certificate::count(),
        ];

        $popularCourses = Course::withCount('transactions')
            ->with('tutor.user')
            ->orderByDesc('transactions_count')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return Inertia::render('Dashboard', [
            'stats' => $stats,
            'popularCourses' => $popularCourses,
            'learningSummary' => [
                'active_enrollments' => $userEnrollments->where('sudah_selesai', false)->count(),
                'total_enrollments' => $userEnrollments->count(),
                'progress_percent' => $progressPercent,
                'materials_count' => $materialCount,
                'quiz_done_count' => $quizDoneCount,
                'certificates_available_count' => $certificateAvailableCount,
            ],
        ]);
    }
}
