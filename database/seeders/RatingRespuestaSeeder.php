<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating_respuestas')->insert([
            ['rating' => 1, 'user_id' => 1, 'respuesta_id' => 1],
            ['rating' => 2, 'user_id' => 2, 'respuesta_id' => 1],
            ['rating' => 3, 'user_id' => 1, 'respuesta_id' => 2],
            ['rating' => 4, 'user_id' => 3, 'respuesta_id' => 3],
            ['rating' => 4, 'user_id' => 2, 'respuesta_id' => 3],
            ['rating' => 4, 'user_id' => 1, 'respuesta_id' => 3],
        ]);
    }
}
