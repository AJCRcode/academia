<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamAssignment extends Model
{
    use HasFactory;
    protected $fillable = ['form_id', 'student_id'];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function estudiantes()
    {
        return $this->belongsTo(User::class, 'student_id',);
    }

}
