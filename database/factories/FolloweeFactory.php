<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Followee>
 */
class FolloweeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $combos = [];
        
        // Ambil target user secara acak
        $target = User::inRandomOrder()->first()->id;
        $source = $this->faker->numberBetween(1, 10);

        // Pastikan kombinasi target-source unik dan source tidak sama dengan target
        while (in_array([$target, $source], $combos) || $source == $target) {
            $source = $this->faker->numberBetween(1, 10);
        }

        // Tambahkan kombinasi unik ke dalam array
        $combos[] = [$target, $source];

        return [
            'source' => $source,
            'target' => $target,
        ];
        // return [
        //     "target" => fake()->numberBetween(1,10),
        //     "source" => fake()->numberBetween(1,10),
        // ];
    }
}
