<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating_ejercicio extends Model
{
    use HasFactory;

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
