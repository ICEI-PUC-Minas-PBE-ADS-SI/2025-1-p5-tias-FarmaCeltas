<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpenAIQuestion extends Model
{
    protected $table = 'openai_questions';
    protected $fillable = ['user_id', 'question', 'answer'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
