<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->sentence(5),
            'content' => fake()->sentence(50),
            'category' => fake()->sentence(1),
            'image' => $imagePath = fake()->image('public/storage/images', 640, 480, null, false, true, null, false, 'jpg'),
        ];
    }
}
