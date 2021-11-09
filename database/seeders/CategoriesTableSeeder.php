<?php

namespace Database\Seeders;

use Faker\Guesser\Name;
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
        DB::table('categories')->truncate();

        $categories = [
            [
                'name' => 'Điện thoại',
                'slug' => 'dien-thoai',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Máy tính',
                'slug' => 'may-tinh',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Phần cứng',
                'slug' => 'phan-cung',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'created_at' => now(),
                'updated_at' => now()
            ]

        ];
        DB::table('categories')->insert($categories);
    }
}
