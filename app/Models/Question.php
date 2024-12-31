<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['form_id', 'materia_id', 'titulo', 'tipo'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
