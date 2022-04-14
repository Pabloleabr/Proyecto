<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respuestas')->insert([
            ['respuesta' => 'respuesta1', 'user_id' => 1, 'pregunta_id' => null, 'ejercicio_id' => 1],
            ['respuesta' => 'respuesta2', 'user_id' => 2, 'pregunta_id' => null, 'ejercicio_id' => 1],
            ['respuesta' => 'respuesta3', 'user_id' => 1, 'pregunta_id' => null, 'ejercicio_id' => 2],
            ['respuesta' => 'respuesta4', 'user_id' => 3, 'pregunta_id' => null, 'ejercicio_id' => 3],
            ['respuesta' => 'respuesta5', 'user_id' => 1, 'ejercicio_id' => null,'pregunta_id' => 1],
            ['respuesta' => 'respuesta6', 'user_id' => 2, 'ejercicio_id' => null,'pregunta_id' => 1],
            ['respuesta' => 'respuesta7', 'user_id' => 3, 'ejercicio_id' => null,'pregunta_id' => 1],
            ['respuesta' => 'respuesta8', 'user_id' => 2, 'ejercicio_id' => null,'pregunta_id' => 2],
            ['respuesta' => 'respuesta9', 'user_id' => 1, 'ejercicio_id' => null,'pregunta_id' => 3],
        ]);
    }
}
