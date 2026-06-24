<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaction;
use App\Models\Tutor;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard dengan statistik dan kursus populer yang nyata
     * (bukan dummy), diambil langsung dari database.
     */
    public function index()
    {
        $stats = [
            'kursus'    => Course::count(),
            'tutor'     => Tutor::count(),
            'siswa'     => User::count(),
            'transaksi' => Transaction::count(),
        ];

        // "Populer" = kursus dengan jumlah transaksi terbanyak.
        $popularCourses = Course::withCount('transactions')
            ->with('tutor.user')
            ->orderByDesc('transactions_count')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('dashboard', [
            'stats' => $stats,
            'popularCourses' => $popularCourses,
        ]);
    }
}
