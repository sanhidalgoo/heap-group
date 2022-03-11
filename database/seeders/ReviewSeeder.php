<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

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
    }
}
