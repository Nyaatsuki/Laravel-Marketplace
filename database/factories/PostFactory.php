<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'image' => "/defaults/placeholder.jpg",
            'excerpt' => '<p>' . implode( '</p><p>', fake()->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode( '</p><p>', fake()->paragraphs(random_int(10, 20))) . '</p>',
            'published_at' => fake()->dateTimeThisMonth()->format('Y-m-d H:i:s')
        ];
    }
}
