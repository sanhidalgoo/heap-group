<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefundOrder;

class ReviewSeeder extends Seeder
{
    /**
     * Seed the review table.
     *
     * @return void
     */
    public function run()
    {
        RefundOrder::factory(10)->create();
    }
}
