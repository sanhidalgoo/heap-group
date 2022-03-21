<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Seed the refundOrder table.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(20)->create();
    }
}
