<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('preguntas')->insert([
            ['titulo' => 'Incrementar en python?',
             'descripcion' => 'Estoy aprendiendo python y queria saber si se puede incrementar como en otros lenguajes con varible++',
             'user_id' => 1],
            ['titulo' => 'rellenar',
             'descripcion' => 'futura pregunta',
             'user_id' => 1],
            ['titulo' => 'admin',
             'descripcion' => 'admin3@admin.com',
             'user_id' => 2],

        ]);
    }
}
