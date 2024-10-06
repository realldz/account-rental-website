<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCircleFactory extends Factory
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
            'circle_price' => $this->faker->numberBetween(1000, 999999),
            'circle_unit' => $this->faker->numberBetween(1, 4),
            'circle_value' => $this->faker->numberBetween(1, 3),
        ];
    }
}
