<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating_preguntas')->insert([
            ['rating' => 1, 'user_id' => 1, 'pregunta_id' => 1],
            ['rating' => 2, 'user_id' => 2, 'pregunta_id' => 1],
            ['rating' => 3, 'user_id' => 1, 'pregunta_id' => 2],
            ['rating' => 4, 'user_id' => 3, 'pregunta_id' => 3],
            ['rating' => 4, 'user_id' => 2, 'pregunta_id' => 3],
            ['rating' => 4, 'user_id' => 1, 'pregunta_id' => 3],
        ]);
    }
}
