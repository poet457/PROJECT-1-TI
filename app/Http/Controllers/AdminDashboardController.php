<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Transaction;
use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;

class AdminDashboardController extends Controller
{
    public function index(): Response
    {
        $successfulTransactions = Transaction::with(['course', 'user'])
            ->where('status', 'success')
            ->latest()
            ->get();

        return Inertia::render('Admin/Dashboard', [
            'stats' => [
                'students' => User::where('role', 'student')->count(),
                'courses' => Course::count(),
                'active_enrollments' => Enrollment::where('ends_at', '>', now())->count(),
                'expired_enrollments' => Enrollment::where('ends_at', '<=', now())->count(),
                'successful_transactions' => $successfulTransactions->count(),
                'revenue' => $successfulTransactions->sum(fn (Transaction $transaction) => $transaction->course?->harga ?? 0),
            ],
            'recentTransactions' => $successfulTransactions
                ->take(6)
                ->map(fn (Transaction $transaction) => [
                    'id' => $transaction->id,
                    'student' => $transaction->user?->name ?? 'Student',
                    'course' => $transaction->course?->nama_kursus ?? 'Course',
                    'amount' => $transaction->course?->harga ?? 0,
                    'created_at' => $transaction->created_at->translatedFormat('d M Y'),
                ]),
        ]);
    }
}
