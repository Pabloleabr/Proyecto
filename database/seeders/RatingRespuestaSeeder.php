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
            ['rating' => 5, 'user_id' => 3, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 4, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 5, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 6, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 7, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 8, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 9, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 10, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 11, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 12, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 13, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 14, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 15, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 16, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 17, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 18, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 19, 'respuesta_id' => 1],
            ['rating' => 5, 'user_id' => 20, 'respuesta_id' => 1],


        ]);
    }
}
