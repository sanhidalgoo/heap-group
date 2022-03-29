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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new  \Faker\Provider\en_US\Address($faker));

        return [
            'total' => $this->faker->numberBetween($min = 100000, $max = 900000),
            'order_state'  => $faker->randomElement(['pending', 'shipped', 'cancelled', 'delivered']),
            'payment_method'  => $this->faker->randomElement(['CREDIT_CARD', 'CASH', 'PSE']),
            'department'  => $faker->state(),
            'city'  => $faker->city(),
            'address'  => $faker->streetAddress(),
            'user_id' => User::all()->random(1)->pluck('id')->first(),
        ];
    }
}
