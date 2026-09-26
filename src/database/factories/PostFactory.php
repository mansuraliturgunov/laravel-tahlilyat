<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => rand(1, 4),
            'title' => fake()->sentence(4),
            'body' => fake()->sentence(50),
            'photo' => 'photos/1qvV6cCGh9YbW1sH8bUlk9mhXBhPYODMaCT1Rgf8.jpg'
        ];
    }
}
