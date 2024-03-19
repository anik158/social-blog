<?php

namespace Database\Factories;

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
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'is_published' => $this->faker->boolean,
            'min_to_read' => $this->faker->numberBetween(1, 4),
        ];
    }
}
