<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        static $combos = [];

        $post_id = $this->faker->numberBetween(1, 100);
        $user_id = $this->faker->numberBetween(1, 10);

        // Pastikan kombinasi post_id-user_id unik
        while (in_array([$post_id, $user_id], $combos)) {
            $post_id = $this->faker->numberBetween(1, 100);
            $user_id = $this->faker->numberBetween(1, 10);
        }

        // Tambahkan kombinasi unik ke dalam array
        $combos[] = [$post_id, $user_id];

        return [
            'post_id' => $post_id,
            'user_id' => $user_id,
        ];
    }
}
