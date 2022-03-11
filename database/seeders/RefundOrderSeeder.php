<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefundOrder;

class RefundOrderSeeder extends Seeder
{
    /**
     * Seed the refundOrder table.
     *
     * @return void
     */
    public function run()
    {
        RefundOrder::factory(10)->create();
    }
}
