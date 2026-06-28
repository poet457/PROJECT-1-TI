<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'tutor_id',
        'nama_kursus',
        'kategori',
        'harga',
        'deskripsi',
    ];

    /**
     * Tutor pemilik/pengajar kursus ini.
     */
    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }

    /**
     * Materi-materi pembelajaran di dalam kursus ini.
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Transaksi pembelian untuk kursus ini.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Pendaftaran/progress belajar siswa untuk kursus ini.
     */
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Soal-soal kuis untuk kursus ini.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
