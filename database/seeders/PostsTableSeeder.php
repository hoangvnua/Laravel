<?php

namespace Database\Seeders;

use App\Models\Post;
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
        Post::truncate();
        $posts = [
            [
                'title' => 'Covid hôm nay',
                'slug' => 'hihi-hihi',
                'content' => 'Tối ngày 20/9.',
                'status' => 1,
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'category_id' => 1,
                'created_at' => now()
            ]
        ];

        $id_post = DB::table('posts')->insert($posts);
        DB::table('post_tag')->insert([
            'post_id' => $id_post,
            'tag_id' => 1
        ]);
        // Post::factory()->count(10)->create();
    }
}
