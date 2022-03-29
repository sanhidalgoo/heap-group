<?php

// Authors:  David Calle

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;
use App\Models\Beer;

class ReviewSeeder extends Seeder
{
    /**
     * Seed the review table.
     *
     * @return void
     */
    public function run()
    {
        Review::factory(10)->create();
        $review = new Review();
        $review->setComment('aa');
        $review->setScore('3');
        $review->setUserId(User::all()->random(1)->pluck('id')->first());
        $review->setBeerId(Beer::all()->random(1)->pluck('id')->first());
        $review->save();
    }
}
