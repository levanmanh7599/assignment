<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            DB::table('phones')->insert([
                'name' => $faker->word,
                'image' => 'https://i1-vnexpress.vnecdn.net/2024/06/29/0aa0040adb5e7900204f-171962595-3091-8703-1719626024.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=JDyg3Ee4qQGoa3fMptig5w',
                'manufacturer' => $faker->company,
                'release_date' => $faker->dateTime,
                'price' => $faker->randomFloat(2, 100, 1000),
                'quantity' => $faker->numberBetween(1, 100),
                'category_id' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
