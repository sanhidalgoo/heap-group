<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Beer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->sentence(15),
            'score' => $this->faker->numberBetween(0, 5),
            'user_id' => User::all()->random(1)->pluck('id')->first(),
            'beer_id' => Beer::all()->random(1)->pluck('id')->first()
        ];
    }
}
