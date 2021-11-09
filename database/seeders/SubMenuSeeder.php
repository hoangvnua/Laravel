<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sub_menus')->truncate();
        $sub_menu = [
            [
                'name' => 'Tất cả',
                'url' => '/posts',
                'menu_id' => 3
            ],
            [
                'name' => 'Bài  viết theo danh mục',
                'url' => '/posts/list',
                'menu_id' => 3
            ]
        ];

        DB::table('sub_menus')->insert($sub_menu);
    }
}
