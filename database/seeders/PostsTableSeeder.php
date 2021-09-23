<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();
        $posts = [
            [
                'title' => 'Admin',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ],
            [
                'title' => 'user',
                'slug' => 'hihi-hihi',
                'content' => 'hello',
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1
            ]
        ];

        foreach($posts as $post){
            DB::table('posts')->insert($post);
        }
    }
}
