<?php

// app/Models/Flashcard.php
// app/Models/Flashcard.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    use HasFactory;

    protected $fillable = [
        'materia_id',
        'question',
        'answer',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class)->activa();
    }
    public function scopeActiva($query)
    {
        return $query->where('estado', 1);
    }
}
