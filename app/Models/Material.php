<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'uri',
        'titulo',
        'descripcion',
        'materia_id',
        'docente_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function materia(){
        return $this->belongsTo(Materia::class,'materia_id')->activa();
    }
    public function docente(){
        return $this->belongsTo(User::class);
    }
}
