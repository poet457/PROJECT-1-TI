<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'status',
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
}
