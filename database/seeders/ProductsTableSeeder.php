<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'name' => 'Product 1',
                'category_id' => 1,
                'image' => 'product-1.jpg',
                'unit_price' => 200,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 2',
                'category_id' => 2,
                'image' => 'product-2.jpg',
                'unit_price' => 100,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 3',
                'category_id' => 3,
                'image' => 'product-3.jpg',
                'unit_price' => 300,
                'stock_balance' => 60,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 4',
                'category_id' => 4,
                'image' => 'product-4.jpg',
                'unit_price' => 200,
                'stock_balance' => 70,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 5',
                'category_id' => 5,
                'image' => 'product-5.jpg',
                'unit_price' => 600,
                'stock_balance' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 6',
                'category_id' => 6,
                'image' => 'product-6.jpg',
                'unit_price' => 400,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 7',
                'category_id' => 7,
                'image' => 'product-7.jpg',
                'unit_price' => 2200,
                'stock_balance' => 400,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 8',
                'category_id' => 8,
                'image' => 'product-7.jpg',
                'unit_price' => 200,
                'stock_balance' => 90,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 9',
                'category_id' => 9,
                'image' => 'product-8.jpg',
                'unit_price' => 500,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 10',
                'category_id' => 10,
                'image' => 'product-3.jpg',
                'unit_price' => 2300,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 11',
                'category_id' => 11,
                'image' => 'product-1.jpg',
                'unit_price' => 2080,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 12',
                'category_id' => 12,
                'image' => 'product-2.jpg',
                'unit_price' => 4500,
                'stock_balance' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Product 13',
                'category_id' => 13,
                'image' => 'product-6.jpg',
                'unit_price' => 2300,
                'stock_balance' => 470,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
