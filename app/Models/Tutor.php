<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'keahlian',
        'harga',
        'deskripsi',
    ];

    /**
     * Akun user yang menjadi tutor ini.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Semua kursus yang dibuat oleh tutor ini.
     */
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
