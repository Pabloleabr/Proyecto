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
            ['name' => 'Martin2', 'email' => 'Martin2@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin3', 'email' => 'Martin3@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin4', 'email' => 'Martin4@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin5', 'email' => 'Martin5@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin6', 'email' => 'Martin6@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin7', 'email' => 'Martin7@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin8', 'email' => 'Martin8@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin9', 'email' => 'Martin9@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin0', 'email' => 'Martin0@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin0', 'email' => 'Martin01@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin0', 'email' => 'Martin02@gmail.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'Martin0', 'email' => 'Martin03@gmail.com', 'password' => bcrypt('adminadmin')],





        ]);
    }
}
