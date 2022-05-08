<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanotest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pulsaciones',
        'correctas',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
