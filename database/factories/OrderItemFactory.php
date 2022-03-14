<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Beer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subtotal' => $this->faker->numberBetween($min = 1500, $max = 600000),
            'quantity' => $this->faker->numberBetween(0, 10),
            'beer_id' => Beer::all()->random(1)->pluck('id')->first()
        ];
    }
}
