<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(10);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->text(),
            'category_id' => rand(1, 10),
            'user_created_id' => rand(1, 10),
            'user_updated_id' => rand(1, 10),
            'img_url' => $this->faker->imageUrl()
        ];
    }
}
