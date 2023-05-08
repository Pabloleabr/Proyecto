<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjercicioLenguajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ejercicio_lenguaje')->insert([
            ['lenguaje_id' => 1, 'ejercicio_id' => 2],
            ['lenguaje_id' => 2, 'ejercicio_id' => 2],
            ['lenguaje_id' => 3, 'ejercicio_id' => 1],
            ['lenguaje_id' => 4, 'ejercicio_id' => 3],
            ['lenguaje_id' => 1, 'ejercicio_id' => 1],
            ['lenguaje_id' => 1, 'ejercicio_id' => 4],

        ]);
    }
}
