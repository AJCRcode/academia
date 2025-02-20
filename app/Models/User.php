<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function materias(){
        return $this->belongsToMany(Materia::class, 'user_materias')->activa();
    }


    public function materiales(){
        return $this->hasMany(Materia::class, 'docente_id', 'id');
    }

    public function respuestas()
    {
        return $this->hasMany(Answer::class , 'student_id', 'id');
    }

    public function formulariosCreados()
    {
        return $this->hasMany(Form::class, 'teacher_id', 'id');
    }

    public function formulariosAsignados()
    {
        return $this->belongsToMany(Form::class, 'exam_assignments', 'student_id', 'form_id')->activa();
    }
}
