<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    protected $fillable = [
        'course_id',
        'judul',
        'konten',
    ];

    /**
     * Kursus tempat materi ini berada.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
