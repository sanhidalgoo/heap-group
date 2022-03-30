<?php

// Authors: Juan Sebastián Díaz

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beer;
use App\Models\User;

class BeerUserSeeder extends Seeder
{
    /**
     * Seed the beer_user table.
     *
     * @return void
     */
    public function run()
    {
        $beers = Beer::all();
        $users = User::all();

        // Foreach user, we are going to select between 0 and 3 random beers
        $users->each(function ($user) use ($beers) {
            $totalBeers = rand(0, 3);
            $user->favoriteBeers()->attach(
                $beers->random($totalBeers)->pluck('id')->toArray()
            );
        });
    }
}
