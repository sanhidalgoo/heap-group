<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RefundOrder>
 */
class RefundOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $requestDate = $this->faker->dateTimeBetween('-5 months', 'now');
        $approvalDate = $this->faker->dateTimeBetween($requestDate->format('Y-m-d H:i:s') . ' +2 days', $requestDate->format('Y-m-d H:i:s') . ' +4 days');
        $deliveryDate = $this->faker->dateTimeBetween($approvalDate->format('Y-m-d H:i:s') . ' +15 days', $approvalDate->format('Y-m-d H:i:s') . ' +30 days');
        return [
            'motive' => $this->faker->word(),
            'requestDate' => $requestDate,
            'approvalDate' => $approvalDate,
            'deliveryDate' => $deliveryDate,
            'state' => $this->faker->word(),
        ];
    }
}
