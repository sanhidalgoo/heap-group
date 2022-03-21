<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderItem;

class OrderItemSeeder extends Seeder
{
    /**
     * Seed the orderItem table.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::factory(10)->create();
    }
}
