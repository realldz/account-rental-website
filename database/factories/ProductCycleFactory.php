<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCycleFactory extends Factory
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
            'cycle_price' => $this->faker->numberBetween(1000, 999999),
            'cycle_unit' => $this->faker->numberBetween(1, 4),
            'cycle_value' => $this->faker->numberBetween(1, 3),
        ];
    }
}
