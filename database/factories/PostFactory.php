<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->unique()->sentence;
        return [
            'user_id' => User::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'image' => $this->faker->imageUrl(),
            'is_published' => $this->faker->boolean,
            'min_to_read' => $this->faker->numberBetween(1, 4),
        ];
    }
}
