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
            ['respuesta' => 'Se puede preguntar cualquier cosa relacionada con el desarrollo y programación, tanto en ámbito web como otros, además de comentar cualquier curiosidad que uno vea, no solo preguntas, a pesar de ser su mayor enfoque.', 'user_id' => 7, 'ejercicio_id' => null,'pregunta_id' => 2],
            ['respuesta' => 'Además de ayudar a personas y aprender mejorando tus habilidades, si tu respuesta es buena y le gusta a la gente recibirás insignias dependiendo de cuantas personas te respondan', 'user_id' => 8, 'ejercicio_id' => null,'pregunta_id' => 3],
            ['respuesta' => 'Para empezar es bueno empezar con un lenguaje simple que te ayude a montar una base y no complicarse mucho con qué lenguaje es mejor o peor ya que eso dependerá del uso que le quieras dar en el futuro y lo primero es aprender lo fundamental que se comparte entre todos.', 'user_id' => 1, 'ejercicio_id' => null,'pregunta_id' => 4],
            ['respuesta' => 'Sii, yo recomiendo mucho python.', 'user_id' => 7, 'ejercicio_id' => null,'pregunta_id' => 4],
            ['respuesta' => 'Yo empecé con javascript y ha sido todo lo que he usado así que es lo que recomiendo.', 'user_id' => 2, 'ejercicio_id' => null,'pregunta_id' => 4],
            ['respuesta' => 'La mejor manera que tiene python para invertir una cadena es como tal:
            var = string[::-1]
            que es una forma de manipular cadenas muy útil en python, en este caso manipulamos como avanza la cadena y al poner -1 lo invierte.
            ', 'user_id' => 4, 'ejercicio_id' => null,'pregunta_id' => 5],
            ['respuesta' => 'También se puede hacer como en otro lenguajes e iterar desde la última posición de la cadena hacia abajo', 'user_id' => 9, 'ejercicio_id' => null,'pregunta_id' => 5],
            ['respuesta' => "Un ejemplo básico es:
            public class Main {
              int x = 5;

              public static void main(String[] args) {
                Main myObj = new Main();
                System.out.println(myObj.x);
              }\n
            }
            Asegurandote de que el fichero tiene el mismo nombre que la clase y depues escribiendo en la terminal javac Main.java para compilarlo y java Main para ejecutar tu código
            ", 'user_id' => 7, 'ejercicio_id' => null,'pregunta_id' => 6],
            ['respuesta' => 'Te recomiendo mirar https://www.w3schools.com/java/java_classes.asp
            ', 'user_id' => 8, 'ejercicio_id' => null,'pregunta_id' => 6],



        ]);
    }
}
