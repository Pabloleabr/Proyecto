<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    public function respuestas()
    {
        $this->hasMany(Respuesta::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating_ejercicio::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
