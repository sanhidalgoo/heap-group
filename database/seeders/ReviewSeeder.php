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
        Review::factory(35)->create();
    }
}
