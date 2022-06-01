<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin', 'email' => 'admin@admin.com', 'password' =>bcrypt('adminadmin')],
            ['name' => 'admin2', 'email' => 'admin2@admin.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'admin3', 'email' => 'admin3@admin.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Pepe', 'email' => 'Pepe@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Maria', 'email' => 'Maria@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Jesus', 'email' => 'Jesus@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Ricardo', 'email' => 'Ricardo@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Alfredo', 'email' => 'Alfredo@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Alfonso', 'email' => 'Alfonso@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Alex', 'email' => 'Alex@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin', 'email' => 'Martin@gmail.com', 'password' => bcrypt('adminadmin')],



        ]);
    }
}
