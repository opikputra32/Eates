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
                'name' => 'Samsung 32 HD',
                'description' => 'Wide Color Enhancer, Connect Share Transfer,HD Resolution',
                'price' => 3025000,
                'category_id' => 1,
                'image' => 'image/samsung_32_hd.jpg'

            ],
            [
                'name' => 'Iphone XR',
                'description' => 'Full screen design, Liquid Retina display, TrueDepth Camera, Face ID and A12 Bionic',
                'price' => 5950000,
                'category_id' => 3,
                'image' => 'image/iphone_xr.jpg'
            ],
            [
                'name' => 'iPhone 11',
                'description' => 'The curved corners follow a beautiful curved design, and they are all within a standard rectangle',
                'price' => 10770000,
                'category_id' => 3,
                'image' => 'image/iphone_11.jpg'
            ],
            [
                'name' => 'Acer Swift',
                'description' => 'Disrupt the status quo with the powerful performance of the 1.37 kg',
                'price' => 12594000,
                'category_id' => 2,
                'image' => 'image/acer_swift.jpg'
            ],
            [
                'name' => 'Asus ROG',
                'description' => 'The first ROG motherboards made hardcore',
                'price' => 14449000,
                'category_id' => 2,
                'image' => 'image/asus_rog.jpg'
            ],
            [
                'name' => 'Iphone XS',
                'description' => 'Features 5.8" display. Apple A12 Bionic chipset',
                'price' => 4845000,
                'category_id' => 3,
                'image' => 'image/iphone_xs.jpg'
            ],
            [
                'name' => 'Asus TUF',
                'description' => 'Samsung Note 20 Ultra 256GB Ready Stock!',
                'price' => 10300000,
                'category_id' => 2,
                'image' => 'image/asus_tuf.jpg'
            ],
            [
                'name' => 'LG 43 FHD',
                'description' => 'A New Level of Full-HD, Dynamic Color Enhance. Dolby Audio A Movie-like Sound Experience',
                'price' => 4000000,
                'category_id' => 1,
                'image' => 'image/lg_43_fhd.jpg'
            ],
            [
                'name' => 'Samsung 43 FHD',
                'description' => 'Tuner Digital 3D Technology No Smart tv Yes Display Type Flat Smart Platform',
                'price' => 4650000,
                'category_id' => 1,
                'image' => 'image/samsung_43_fhd.jpg'
            ],
            [
                'name' => 'Samsung Note 20',
                'description' => 'APro-Grade Camera & Incredibly Realistic Pen Experience',
                'price' => 15999000,
                'category_id' => 3,
                'image' => 'image/samsung_note_20.jpg'
            ],
            [
                'name' => 'Samsung a52',
                'description' => 'IP67-Rated Wated Resistant for up to 30 minutes. 6.5" Screen and Infinity-O Camera',
                'price' => 4999000,
                'category_id' => 3,
                'image' => 'image/samsung_a52.jpg'
            ],
            [
                'name' => 'Samsung s21',
                'description' => 'Witness the fastest chip ever in a Galaxy. With a 5nm processor',
                'price' => 14999000,
                'category_id' => 3,
                'image' => 'image/samsung_s21.jpg'
            ],
            [
                'name' => 'LG 43 UHD',
                'description' => 'A New Intelligence Evolved With AI With the LG ThinQ AI. many things are possible with just your voice',
                'price' => 7138000,
                'category_id' => 1,
                'image' => 'image/lg_43_uhd.jpg'
            ],
            [
                'name' => 'Lenovo Yoga',
                'description' => '(Shadow Black) Intel® Core™ i7-1185G7 Processor (4C / 8T, 3.0 / 4.8GHz, 12MB) 16GB LPDDR4X 42666MHz Onboard 1TB',
                'price' => 28634000,
                'category_id' => 2,
                'image' => 'image/lenovo_yoga.jpg'
            ],
            [
                'name' => 'Lenovo Legion',
                'description' => 'The Lenovo Legion gaming laptops have the processing and graphics performance you need in a stylish mobile package.',
                'price' => 24765000,
                'category_id' => 2,
                'image' => 'image/lenovo_legion.jpg'
            ],
            [
                'name' => 'Samsung 55 QLED',
                'description' => 'Resolution 3840 x 2160 Power Consumption 185 W | 225 W HDMI 4USB 2 PICTURE Engine Quantum Processor 4K Design',
                'price' => 14739000,
                'category_id' => 1,
                'image' => 'image/samsung_55_qled.jpg'
            ],
            [
                'name' => 'Samsung 65 Crystal',
                'description' => 'Resolution 3840 x 2160 Power Consumption 185 W | 225 W HDMI 4USB 2 PICTURE Engine Quantum Processor 4K Design',
                'price' => 21739000,
                'category_id' => 1,
                'image' => 'image/samsung_65_crystal.jpg'
            ],

        ]);
    }
}
