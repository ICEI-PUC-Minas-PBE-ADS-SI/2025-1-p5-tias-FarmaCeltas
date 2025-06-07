<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizzQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id',
        'exercise_statement',
        'correct_answer',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quizz::class);
    }
}
