<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'total_price' => $this->faker->numberBetween(1000, 1000000),
            'status' => $this->faker->randomElement([-1, 0, 1]),
            'payment_method' => $this->faker->randomElement(['bank', 'credit']),
        ];
    }
}