<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class);
    }
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class);
    }
    public function respuestas()
    {
        return $this->hasMany(Respuesta::class);
    }
    public function rating_ejercicios()
    {
        return $this->hasMany(Rating_ejercicio::class);
    }
    public function rating_respuestas()
    {
        return $this->hasMany(Rating_respuesta::class);
    }
    public function rating_preguntas()
    {
        return $this->hasMany(Rating_pregunta::class);
    }
    public function Mecanotests()
    {
        return $this->hasMany(Mecanotest::class);
    }
}
