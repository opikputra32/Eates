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
            [
                'full_name' => 'admin',
                'gender' => 'male',
                'role' => 'admin',
                'address' => 'kantor scbd',
                'email' => 'admin@mail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'full_name' => 'Mochammad Taufiek Pratama Putra',
                'gender' => 'male',
                'role' => 'member',
                'address' => 'kantor scbd',
                'email' => 'taufiek@mail.com',
                'password' => bcrypt('taufiek'),
            ],
        ]);
    }
}
