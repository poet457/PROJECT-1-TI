<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Tampilkan daftar seluruh kursus beserta nama tutornya.
     */
    public function index()
    {
        $courses = Course::with('tutor.user')->latest()->get();

        return view('courses.index', compact('courses'));
    }
}
