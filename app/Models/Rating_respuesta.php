<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating_respuesta extends Model
{
    use HasFactory;

    public function respuesta()
    {
        return $this->belongsTo(Respuesta::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
