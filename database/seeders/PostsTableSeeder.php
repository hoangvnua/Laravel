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
        // $posts = [
        //     [
        //         'title' => 'Covid hôm nay',
        //         'slug' => 'hihi-hihi',
        //         'content' => 'Tối ngày 20/9, Hà Nội ghi nhận thêm 3 ca mắc COVID-19 đều là người trong cùng gia đình của ca bệnh cộng đồng ở phường Vĩnh Hưng, quận Hoàng Mai. Ngày hôm nay, Hà Nội chỉ ghi nhận 9 ca mắc COVID-19, thấp nhất trong hơn 2 tháng qua.',
        //         'user_created_id' => 1,
        //         'user_updated_id' => 1,
        //         'category_id' => 1,
        //         'created_at' => now()
        //     ]
        // ];
        // DB::table('posts')->insert($posts);
        Post::factory()->count(10)->create();
    }
}
