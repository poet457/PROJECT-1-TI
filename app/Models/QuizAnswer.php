<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizAnswer extends Model
{
    protected $fillable = [
        'enrollment_id',
        'question_id',
        'jawaban_dipilih',
        'is_benar',
    ];

    protected $casts = [
        'is_benar' => 'boolean',
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
