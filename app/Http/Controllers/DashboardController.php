<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use App\Models\Tutor;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'kursus'    => Course::count(),
            'tutor'     => Tutor::count(),
            'siswa'     => User::count(),
            'transaksi' => Transaction::count(),
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
        ]);
    }
}