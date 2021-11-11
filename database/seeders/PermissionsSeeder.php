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
        DB::table('permissions')->truncate();
        
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
            ]
        ];
        DB::table('permissions')->insert($permission);
    }
}
