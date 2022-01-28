<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenguajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lenguajes')->insert([
            ['lenguaje' => 'php'],
            ['lenguaje' => 'js'],
            ['lenguaje' => 'python'],
            ['lenguaje' => 'java'],
        ]);
    }
}
