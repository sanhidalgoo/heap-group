<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Beer;
use App\Models\Order;

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
        $beer = Beer::all()->random(1)->first();
        $quantity = $this->faker->numberBetween($min = 1, $max = 10);
        $total = $beer->getPrice() * $quantity;

        return [
            'subtotal' => $total,
            'quantity' => $quantity,
            'beer_id' => $beer->getId(),
        ];
    }
}
