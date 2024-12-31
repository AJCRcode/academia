<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = ['question_id', 'opcion', 'es_correcta','tipo'];

    // Relación con la pregunta
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
