<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $j = 1;
        
        for($i=0; $i<2; $i++){
            $product = new Product;

            $product->image = 'image'.$j++.'.jpg';
            $product->name = $faker->jobTitle();
            $product->price_buy = $faker->randomNumber(1).'9000';
            $product->price_sell = $faker->randomNumber(2).'0000';
            $product->stock = $faker->randomNumber(2);

            $product->save();
        }
    }
}
