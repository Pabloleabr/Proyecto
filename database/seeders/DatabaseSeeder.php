<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            LenguajeSeeder::class,
            UserSeeder::class,
            PreguntaSeeder::class,
            EjercicioSeeder::class,
            EjercicioLenguajeSeeder::class,
            RespuestaSeeder::class,
            RatingRespuestaSeeder::class,
            RatingEjercicioSeeder::class,
            RatingPreguntaSeeder::class,
        ]);
    }
}
