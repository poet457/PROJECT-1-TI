<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Enrollment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    /**
     * Unduh sertifikat PDF untuk kursus yang sudah selesai (30 hari)
     * dan kuisnya sudah dikerjakan.
     */
    public function download(Enrollment $enrollment)
    {
        abort_if($enrollment->user_id !== Auth::id(), 403);

        $enrollment->load(['course.tutor.user', 'user']);

        if (! $enrollment->bisa_unduh_sertifikat) {
            $alasan = ! $enrollment->sudah_selesai
                ? 'Kursus ini masih berjalan, sertifikat baru bisa diunduh setelah masa belajar 30 hari berakhir.'
                : 'Kamu belum mengerjakan kuis kursus ini. Selesaikan kuisnya dulu sebelum mengunduh sertifikat.';

            return redirect()
                ->route('enrollments.show', $enrollment)
                ->with('error', $alasan);
        }

        $certificate = Certificate::firstOrCreate(
            ['enrollment_id' => $enrollment->id],
            [
                'kode_sertifikat' => 'EDX-'.now()->format('Y').'-'.str_pad($enrollment->id, 5, '0', STR_PAD_LEFT).'-'.Str::upper(Str::random(4)),
                'diterbitkan_pada' => now(),
            ]
        );

        $namaFile = 'Sertifikat-'.Str::slug($enrollment->course->nama_kursus).'.pdf';

        $pdf = Pdf::loadView('certificates.pdf', [
            'enrollment' => $enrollment,
            'certificate' => $certificate,
        ])->setPaper('a4', 'landscape');

        return $pdf->download($namaFile);
    }
}
