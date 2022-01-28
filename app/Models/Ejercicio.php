<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo' ,
        'descripcion' ,
        'resultado' ,
        'dificultad' ,
        'user_id',
    ];

    public function lenguajes()
    {
        return $this->belongsToMany(Lenguaje::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating_ejercicio::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
}
