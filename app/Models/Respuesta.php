<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'respuesta',
        'user_id',
        'pregunta_id',
        'ejercicio_id',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating_respuesta::class);
    }
    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
