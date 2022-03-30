<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefundOrder;
use App\Models\Order;

class RefundOrderSeeder extends Seeder
{
    /**
     * Seed the refundOrder table.
     *
     * @return void
     */
    public function run()
    {
        $orders = Order::inRandomOrder()->take(3)->get();

        $orders->each(function ($order) {
            RefundOrder::factory()->create(['order_id' => $order->id]);
        });
    }
}
