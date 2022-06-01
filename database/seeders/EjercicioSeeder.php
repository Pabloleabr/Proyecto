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
            ['titulo' => 'Desplazamiento a la derecha por división',
             'descripcion' => 'La operación de desplazamiento a la derecha es similar a la división de piso por potencias de dos .
             Ejemplo de cálculo utilizando el operador de desplazamiento a la derecha ( >>):
             80 >> 3 = floor(80/2^3) = floor(80/8) = 10
             -24 >> 2 = floor(-24/2^2) = floor(-24/4) = -6
             -5 >> 1 = floor(-5/2^1) = floor(-5/2) = -3
             Escriba una función que imite (sin el uso de >> ) el operador de desplazamiento a la derecha y devuelva el resultado de los dos enteros dados.
             Ejemplos
             shiftToRight(80, 3) ➞ 10

             shiftToRight(-24, 2) ➞ -6

             shiftToRight(-5, 1) ➞ -3

             shiftToRight(4666, 6) ➞ 72

             shiftToRight(3777, 6) ➞ 59

             shiftToRight(-512, 10) ➞ -1
             notas
             No habrá valores negativos para el segundo parámetro y.
             Este desafío es más como recrear la operación de cambio a la derecha , por lo tanto, el uso del operador directamente está prohibido .
             Alternativamente, puede resolver este desafío a través de la recursividad.',
             'user_id' => 5,
             'dificultad' => 'normal'],
            ['titulo' => 'admin',
             'descripcion' => 'admin3@admin.com',
             'user_id' => 2,
             'dificultad' => 'normal'],

        ]);
    }
}
