<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $username = $this->faker->unique()->userName;
        $password = $this->faker->unique()->password;
        return [
            'info' => "$username | $password",
            'product_id' => \App\Models\Product::factory(),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}