<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $j = 1;
        
        for($i=0; $i<2; $i++){
            $barang = new Barang;

            $barang->image = 'img.jpg';
            $barang->name = $faker->jobTitle();
            $barang->price_buy = $faker->randomNumber(1).'9000';
            $barang->price_sell = $faker->randomNumber(2).'0000';
            $barang->stock = $faker->randomNumber(2);

            $barang->save();
        }
    }
}
