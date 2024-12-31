<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'materia_id'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'form_id');
    }

    public function materia(){
        return $this->belongsTo(Materia::class, 'materia_id');
    }

    public function docente() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function preguntas()
    {
        return $this->hasMany(Question::class, 'form_id');
    }

    public function asignados()
    {
        return $this->belongsToMany(User::class, 'exam_assignments', 'form_id', 'student_id');
    }

}
