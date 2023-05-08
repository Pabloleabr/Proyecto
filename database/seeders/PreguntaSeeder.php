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
            ['titulo' => '¿Incrementar en python?',
             'descripcion' => 'Estoy aprendiendo python y queria saber si se puede incrementar como en otros lenguajes con varible++',
             'user_id' => 1],
            ['titulo' => '¿Qué puedo preguntar en está página?',
             'descripcion' => '',
             'user_id' => 2],
            ['titulo' => '¿Por qué debería hacer ejercicios o resolver dudas?',
             'descripcion' => 'En que me beneficia',
             'user_id' => 3],
             ['titulo' => '¿Qué lenguaje debería aprender primero?',
             'descripcion' => 'Estoy aprendiendo a programar quería saber que lenguaje es el mejor para empezar y por que.',
             'user_id' => 4],
             ['titulo' => '¿Como hago para invertir una cadena en python?',
             'descripcion' => 'por ejemplo parar “palabra” a “arbalap”',
             'user_id' => 5],
             ['titulo' => '¿Cómo ejecutar código java?',
             'descripcion' => 'Esto empezando y he escrito un poco código en el main pero no se como ejecutarlo',
             'user_id' => 6],


        ]);
    }
}
