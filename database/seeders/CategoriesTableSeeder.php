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
            ],
            [
                'name' => 'Máy tính'
            ],
            [
                'name' => 'Phần cứng'
            ],
            [
                'name' => 'Phụ kiện'
            ]

        ];
        DB::table('categories')->insert($categories);
    }
}
