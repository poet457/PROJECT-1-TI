<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'status',
        'metode_pembayaran',
    ];

    /**
     * User yang melakukan transaksi (pembeli kursus).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Kursus yang dibeli pada transaksi ini.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Enrollment yang dihasilkan dari transaksi ini (jika sukses).
     */
    public function enrollment(): HasOne
    {
        return $this->hasOne(Enrollment::class);
    }
}
