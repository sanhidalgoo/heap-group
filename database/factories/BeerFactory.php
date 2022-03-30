<?php

// Authors: Juan Sebastián Díaz

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beer>
 */
class BeerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fakeBeers = [
            [
                'name' => 'Pilsen ' . $this->faker->name(),
                'brand' => 'Cervecería Bavaria S.A.',
                'origin' => 'Medellín, Colombia',
                'abv' => 0.045,
                'ingredient' => 'Czech barley',
                'flavor' => 'Soft',
                'format' => '330ml bottle',
                'price' => 2200,
                'details' => 'A traditional Colombian beer from Antioquia',
                'quantity_available' => $this->faker->numberBetween(100, 150),
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQG_Og8rmtrU_DHBeu6jPK9y9p36DmzzDqXp_5oUQyQrpzL4gs8nUM-ByV8pdvIaipZYb4&usqp=CAU',
            ],
            [
                'name' => 'Águila ' . $this->faker->name(),
                'brand' => 'Cervecería Bavaria S.A.',
                'origin' => 'Medellín, Colombia',
                'abv' => 0.045,
                'ingredient' => 'Barley, Malt',
                'flavor' => 'Soft',
                'format' => '330ml bottle',
                'price' => 2500,
                'details' => 'A traditional Colombian beer, very popular on Caribbean region',
                'quantity_available' => $this->faker->numberBetween(50, 80),
                'image_url' => 'https://www.bavaria.co/sites/g/files/phfypu1316/f/201903/AGUILA330_1.png',
            ],
            [
                'name' => 'Weidmann ' . $this->faker->name(),
                'brand' => 'UDB',
                'origin' => 'Bavarian, Germany',
                'abv' => 0.042,
                'ingredient' => 'Hops, Malt',
                'flavor' => 'Soft',
                'format' => '330ml can',
                'price' => 2350,
                'details' => 'A German beer',
                'quantity_available' => $this->faker->numberBetween(100, 200),
                'image_url' => 'https://http2.mlstatic.com/D_NQ_NP_872714-MCO43464163507_092020-O.webp',
            ],
        ];

        return $this->faker->randomElement($fakeBeers);
    }
}
