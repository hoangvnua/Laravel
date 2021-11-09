<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::truncate();
        $menus = [
            [
                'name' => 'Trang chủ',
                'url' => '/',
                'status' => 1,
                'sort' =>1
            ],
            [
                'name' => 'Cửa hàng',
                'url' => '/shop',
                'status' => 1,
                'sort' => 2
            ],
            [
                'name' => 'Bài viết',
                'url' => '/posts',
                'status' => 1,
                'sort' => 3
            ],
            [
                'name' => 'Thông tin & chương trình khuyến mãi',
                'url' => '/',
                'status' => 1,
                'sort' => 4
            ],
            [
                'name' => 'Liên hệ',
                'url' => '/',
                'status' => 1,
                'sort' => 5
            ]
        ];
        foreach ($menus as $menu) {
            $menu['created_at'] = now();
            $menu['updated_at'] = now();
            DB::table('menus')->insert($menu);
        }
    }
}
