<?php

use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\TransactionController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $popularCourses = Course::with('tutor.user')->latest()->take(3)->get();

    return view('welcome', compact('popularCourses'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/courses/{course}/daftar', [TransactionController::class, 'store'])->name('courses.enroll');

    Route::get('/kelas-saya', [EnrollmentController::class, 'index'])->name('enrollments.index');
    Route::get('/kelas-saya/{enrollment}', [EnrollmentController::class, 'show'])->name('enrollments.show');

    Route::get('/kelas-saya/{enrollment}/kuis', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/kelas-saya/{enrollment}/kuis', [QuizController::class, 'store'])->name('quiz.store');

    Route::get('/kelas-saya/{enrollment}/sertifikat', [CertificateController::class, 'download'])->name('certificate.download');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
