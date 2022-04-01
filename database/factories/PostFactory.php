<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(),
            'category_id' => random_int(1, 3),
            'user_id' =>random_int(1, 3),
            'excerpt' => $this->faker->sentence(),
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug()
        ];
    }
}
