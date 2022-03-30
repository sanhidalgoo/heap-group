<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;

class OrderSeeder extends Seeder
{
    /**
     * Seed the refundOrder table.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(10)->create()->each(function ($order) {
            $totalOrderItems = rand(1, 5);
            $orderItems = OrderItem::factory($totalOrderItems)->create();

            $order->total = $orderItems->sum('subtotal');
            $order->orderItems()->saveMany($orderItems);
            $order->save();
        });
    }
}
