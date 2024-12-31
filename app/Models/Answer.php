<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'student_id', 'answer'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }

}
