<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjercicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ejercicios')->insert([
            ['titulo' => 'Incrementar en python',
             'descripcion' => 'Crea una funcion que incremente el valor pasado',
             'user_id' => 1,
             'dificultad' => 'facil'],
            ['titulo' => 'rellenar',
             'descripcion' => 'futuro ejercicio',
             'user_id' => 1,
             'dificultad' => 'facil'],
            ['titulo' => 'admin',
             'descripcion' => 'admin3@admin.com',
             'user_id' => 2,
             'dificultad' => 'normal'],

        ]);
    }
}
