<?php

namespace Database\Seeders;

use App\Http\Controllers\Backend\CategoryController;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(MenusTableSeeder::class);
        // $this->call(OrderProductSeederr::class);
        $this->call(OrderSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(SubMenuSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
