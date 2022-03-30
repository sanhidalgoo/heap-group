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
            'total' => 0,
            'order_state'  => $faker->randomElement(['Pending', 'Cancelled', 'Shipped', 'Delivered', 'Missing']),
            'payment_method'  => $this->faker->randomElement(['CREDIT_CARD', 'CASH', 'PSE']),
            'department'  => $faker->state(),
            'city'  => $faker->city(),
            'address'  => $faker->streetAddress(),
            'user_id' => User::all()->random(1)->pluck('id')->first(),
        ];
    }
}
