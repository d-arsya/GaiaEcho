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
            'title'=>fake()->sentence(4),
        'text'=>fake()->text(400),
        'link'=>fake()->url(),
        'image'=>fake()->word(),
        'source'=>fake()->name(),
        'source_image'=>fake()->word(),
        ];
    }
}
