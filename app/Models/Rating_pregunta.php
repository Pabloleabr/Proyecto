<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating_pregunta extends Model
{
    use HasFactory;

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
