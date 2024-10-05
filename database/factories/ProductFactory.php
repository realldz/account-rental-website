<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'info' => $this->faker->sentence,
            'category_id' => \App\Models\Category::factory(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}