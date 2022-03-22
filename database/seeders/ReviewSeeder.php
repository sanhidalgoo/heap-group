<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\User;


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
        $review['user_id'] = User::all()->random(1)->pluck('id')->first();
        $review->save();
    }
}
