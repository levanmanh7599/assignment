<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $Categories = [
            'iPhone 12',
            'iPhone 12 Pro',
            'iPhone 13',
            'iPhone 13 Pro',
            'iPhone 14'
        ];

        foreach ($Categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
