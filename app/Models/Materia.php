<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';

    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'horario',
        'fecha_fin',
        'estado',
        'gestion'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function docentes()
    {
        return $this->belongsToMany(User::class, 'user_materias')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'docente');
            });
    }

    public function estudiantes()
    {
        return $this->belongsToMany(User::class, 'user_materias')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'estudiante');
            });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_materias');
    }

    public function materiales()
    {
        return $this->hasMany(Material::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function flashcards()
    {
        return $this->hasMany(Flashcard::class)->activa();
    }

    public function scopeActiva($query)
    {
        return $query->where('estado', 1);
    }


    public static function all($columns = ['*'])
    {
        // Personaliza la consulta a la base de datos
        return static::query()->activa()->orderBy('id', 'desc')->get($columns);

    }
}
