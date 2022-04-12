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
            ['name' => 'admin', 'email' => 'admin2@admin.com', 'password' => bcrypt('adminadmin')],
            ['name' => 'admin', 'email' => 'admin3@admin.com', 'password' => bcrypt('adminadmin')],

        ]);
    }
}
