<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        UserInfo::truncate();
        // User::factory()->count(5)->create();
        // $users = [
        //     [
        //         'name' => 'Admin',
        //         'avatar' => 'hihi',
        //         'address' => 'hihi',
        //         'phone' => '0123456',
        //         'status' => '0123456',
        //         'email' => 'nvhoang.vnua@gmail.com',
        //         'password' => bcrypt('12345678')
        //     ],
        //     [
        //         'name' => 'user',
        //         'avatar' => 'hihi',
        //         'address' => 'hihi',
        //         'phone' => '0123456',
        //         'status' => '0123456',
        //         'email' => 'nvhoang@gmail.com',
        //         'password' => bcrypt('12345678')
        //     ],
        //     [
        //         'name' => 'user',
        //         'avatar' => 'hihi',
        //         'address' => 'hihi',
        //         'phone' => '0123456',
        //         'status' => '0123456',
        //         'email' => 'nvhoang1@gmail.com',
        //         'password' => bcrypt('12345678')
        //     ],
        //     [
        //         'name' => 'user',
        //         'avatar' => 'hihi',
        //         'address' => 'hihi',
        //         'phone' => '0123456',
        //         'status' => '0123456',
        //         'email' => 'nvhoang2@gmail.com',
        //         'password' => bcrypt('12345678')
        //     ],
        //     [
        //         'name' => 'user',
        //         'avatar' => 'hihi',
        //         'address' => 'hihi',
        //         'phone' => '0123456',
        //         'status' => '0123456',
        //         'email' => 'nvhoang3@gmail.com',
        //         'password' => bcrypt('12345678')
        //     ]
        // ];

        // DB::table('users')->insert($users);

        $users = [
            [
                'user' => [
                    'name' => 'Admin',
                    'status' => '1',
                    'email' => 'nvhoang.vnua@gmail.com',
                    'password' => bcrypt('12345678')
                ],
                'info' => [
                    'address' => 'Bac Ninh',
                    'phone' => '0123456'
                ]
            ],
            [
                'user' => [
                    'name' => 'Admod',
                    'status' => '0123456',
                    'email' => 'nvhoang1@gmail.com',
                    'password' => bcrypt('12345678')
                ],
                'info' => [
                    'address' => 'Ha Noi',
                    'phone' => '1900100'
                ]
            ],
            [
                'user' => [
                    'name' => 'Writer',
                    'status' => '0123456',
                    'email' => 'nvhoang2@gmail.com',
                    'password' => bcrypt('12345678')
                ],
                'info' => [
                    'address' => 'Ha Noi',
                    'phone' => '1900100'
                ]
            ]
        ];
        foreach($users as $user){
            
            $user_id = DB::table('users')->insertGetId($user['user']);
            $user['info']['user_id'] = $user_id;
            DB::table('user_infos')->insert($user['info']);
        }
        // $user_id = User::insert($users['user']);
        // 
        // UserInfo::insert($users['info']);
    }
}
