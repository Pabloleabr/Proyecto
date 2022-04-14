<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo' ,
        'descripcion' ,
        'user_id',
    ];

    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating_pregunta::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
