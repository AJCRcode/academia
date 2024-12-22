<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function student() {
        return $this->belongsTo(User::class, 'student_id');
    }

}
