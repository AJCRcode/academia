<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];
    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function teacher() {
        return $this->belongsTo(User::class, 'teacher_id');
    }

}
