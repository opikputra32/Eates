<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('couriers')->insert(
            [
                ['name' => 'Eates Express'],
                ['name' => 'Restaurant Express'],
            ]
        );
    }
}
