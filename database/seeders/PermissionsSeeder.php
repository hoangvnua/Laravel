<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('permissions')->truncate();
        
        $permission = [
            [
                'name' => 'Thêm người dùng',
                'slug' => 'create-user',
            ],
            [
                'name' => 'Chỉnh sửa người dùng',
                'slug' => 'edit-user',
            ],
            [
                'name' => 'Xóa người dùng',
                'slug' => 'delete-user'
            ],
            [
                'name' => 'Thêm sản phẩm',
                'slug' => 'create-product'
            ],
            [
                'name' => 'Sửa sản phẩm',
                'slug' => 'edit-product'
            ],
            [
                'name' => 'Xóa sản phẩm',
                'slug' => 'delete-product'
            ],
            [
                'name' => 'Xác nhận đơn hàng',
                'slug' => 'confirm-order'
            ],
            [
                'name' => 'Đóng gói',
                'slug' => 'dong-goi'
            ],
            [
                'name' => 'Giao hàng',
                'slug' => 'ship'
            ],
            [
                'name' => 'Giao hàng thất bại',
                'slug' => 'ship-false'
            ],
            [
                'name' => 'Hủy đơn hàng',
                'slug' => 'cancel-order'
            ]
        ];
        DB::table('permissions')->insert($permission);
    }
}
