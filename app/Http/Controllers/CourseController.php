<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Tampilkan daftar seluruh kursus beserta nama tutornya, dan tandai
     * kursus mana saja yang sudah diikuti oleh user yang login.
     */
    public function index()
    {
        $courses = Course::with('tutor.user')->latest()->get();

        $enrolledCourseIds = Auth::user()
            ->enrollments()
            ->pluck('course_id')
            ->toArray();

        return view('courses.index', compact('courses', 'enrolledCourseIds'));
    }
}
