<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'user_id' => \App\Models\User::factory(),
            'parent_id' => $this->faker->optional()->randomElement(
                \App\Models\Comment::pluck('id')->toArray()
            ),
            'content' => $this->faker->sentence,
        ];
    }
}
