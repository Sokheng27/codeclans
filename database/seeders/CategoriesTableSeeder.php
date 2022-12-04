<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Category 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 3',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 4',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 5',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 7',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 8',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 9',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 11',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 12',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Category 13',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
