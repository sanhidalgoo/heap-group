<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefundOrder>
 */
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
            'total' => $this->faker->numberBetween($min = 100000, $max = 900000),
            'order_state'  => $this->faker->word(),
            'payment_method'  => $this->faker->word(),
            'department'  => $this->faker->word(),
            'city'  => $this->faker->word(),
            'address'  => $this->faker->word(),
            'user_id' => User::all()->random(1)->pluck('id')->first()
        ];
    }
}
