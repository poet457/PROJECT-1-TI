<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'transaction_id',
        'started_at',
        'ends_at',
        'score',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    public function quizAnswers(): HasMany
    {
        return $this->hasMany(QuizAnswer::class);
    }

    public function certificate(): HasOne
    {
        return $this->hasOne(Certificate::class);
    }

    /**
     * Sisa hari belajar (0 kalau sudah lewat batas waktu).
     */
    public function getSisaHariAttribute(): int
    {
        if (now()->greaterThanOrEqualTo($this->ends_at)) {
            return 0;
        }

        return now()->diffInDays($this->ends_at);
    }

    /**
     * Apakah periode 30 hari kursus ini sudah berakhir.
     */
    public function getSudahSelesaiAttribute(): bool
    {
        return now()->greaterThanOrEqualTo($this->ends_at);
    }

    /**
     * Apakah siswa sudah mengerjakan kuis kursus ini minimal sekali.
     */
    public function getSudahMengerjakanKuisAttribute(): bool
    {
        return ! is_null($this->score);
    }

    /**
     * Syarat sertifikat: periode 30 hari sudah selesai DAN kuis sudah dikerjakan.
     */
    public function getBisaUnduhSertifikatAttribute(): bool
    {
        return $this->sudah_selesai && $this->sudah_mengerjakan_kuis;
    }

    /**
     * Hitung ulang nilai berdasarkan jawaban kuis yang tersimpan, lalu simpan ke kolom score.
     */
    public function hitungNilai(): int
    {
        $total = $this->quizAnswers()->count();

        if ($total === 0) {
            $this->update(['score' => 0]);

            return 0;
        }

        $benar = $this->quizAnswers()->where('is_benar', true)->count();
        $nilai = (int) round(($benar / $total) * 100);

        $this->update(['score' => $nilai]);

        return $nilai;
    }
}
