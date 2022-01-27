<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function ratings()
    {
        $this->hasMany(Rating_respuesta::class);
    }
    public function ejercicio()
    {
        $this->belongsTo(Ejercicio::class);
    }
}
