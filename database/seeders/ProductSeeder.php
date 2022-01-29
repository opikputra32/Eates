<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => '[KFC] KRISPY BURGER',
                'description' => 'Krispy Burger',
                'price' => 10000,
                'category_id' => 1,
                'image' => 'image/burger-crispy.png'

            ],
            [
                'name' => '[KFC] Burger Fish Fillet',
                'description' => 'Burger Fish Fillet',
                'price' => 10000,
                'category_id' => 1,
                'image' => 'image/burger-fish-fillet.png'
            ],
            [
                'name' => '[KFC] Cream Soup',
                'description' => 'Cream Soup',
                'price' => 5000,
                'category_id' => 2,
                'image' => 'image/cream-soup.png'
            ],
            [
                'name' => '[KFC] Perkedel',
                'description' => 'Perkedel',
                'price' => 5000,
                'category_id' => 2,
                'image' => 'image/perkedel.png'
            ],
            [
                'name' => '[KFC] Burger OR',
                'description' => 'Burger OR',
                'price' => 10000,
                'category_id' => 1,
                'image' => 'image/burger-or.png'
            ],
            [
                'name' => '[KFC] Sundae',
                'description' => 'Sundae Coklat',
                'price' => 10000,
                'category_id' => 3,
                'image' => 'image/sundae.png'
            ],
            [
                'name' => '[Burger King] Ayam',
                'description' => 'Ayam Crispy',
                'price' => 16818,
                'category_id' => 4,
                'image' => 'image/bk-ayam.png'
            ],
            [
                'name' => '[Burger King] Chicken Burger',
                'description' => 'Chicken Burger',
                'price' => 14091,
                'category_id' => 4,
                'image' => 'image/bk-chicken-burger.png'
            ],



        ]);
    }
}
