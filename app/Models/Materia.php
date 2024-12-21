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

    public function user(){
        return $this->belongsToMany(Materia::class, 'user_materias');
    }

}
