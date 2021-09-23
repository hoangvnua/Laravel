<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory()->count(5)->create();
        $users = [
            [
                'name' => 'Admin',
                'avatar' => 'hihi',
                'address' => 'hihi',
                'phone' => '0123456',
                'status' => '0123456',
                'email' => 'nvhoang.vnua@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'user',
                'avatar' => 'hihi',
                'address' => 'hihi',
                'phone' => '0123456',
                'status' => '0123456',
                'email' => 'nvhoang@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'user',
                'avatar' => 'hihi',
                'address' => 'hihi',
                'phone' => '0123456',
                'status' => '0123456',
                'email' => 'nvhoang1@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'user',
                'avatar' => 'hihi',
                'address' => 'hihi',
                'phone' => '0123456',
                'status' => '0123456',
                'email' => 'nvhoang2@gmail.com',
                'password' => bcrypt('12345678')
            ],
            [
                'name' => 'user',
                'avatar' => 'hihi',
                'address' => 'hihi',
                'phone' => '0123456',
                'status' => '0123456',
                'email' => 'nvhoang3@gmail.com',
                'password' => bcrypt('12345678')
            ]
        ];

        foreach($users as $user){
            DB::table('users')->insert($user);
        }
    }
}
