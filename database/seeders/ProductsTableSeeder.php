<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'brand_name' => 'Yokohama Platinum',
                'size' => '1sm',
                'month_warranty' => 27,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 1000,
                'stock' => 10,
            ],
            [
                'brand_name' => 'Yokohama Platinum',
                'size' => 'NS60',
                'month_warranty' => 27,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 1000,
                'stock' => 5,
            ],
            [
                'brand_name' => 'Yokohama Platinum',
                'size' => 'NS40',
                'month_warranty' => 27,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 2456,
                'stock' => 5,
            ],
            [
                'brand_name' => 'Yokohama Platinum',
                'size' => 'din55',
                'month_warranty' => 27,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 5600,
                'stock' => 5,
            ],
            [
                'brand_name' => 'Yokohama Premium',
                'size' => 'NS40',
                'month_warranty' => 18,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 3251,
                'stock' => 5,
            ],
            [
                'brand_name' => 'Yokohama Premium',
                'size' => 'din55',
                'month_warranty' => 18,
                'description' => json_encode(['ah' => '95', 'cca' => '800', 'rc' => '100']),
                'price' => 3319,
                'stock' => 5,
            ],
            // Add more products as needed
        ]);
    }
}
