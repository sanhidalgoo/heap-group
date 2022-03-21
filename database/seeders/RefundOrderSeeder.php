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
        for ($var = 0; $var < 3; $var++) {
            $refundOrder = RefundOrder::factory()->create();
            $order = $refundOrder->order;
            $order->refund_order_id = $refundOrder->id;
            $order->save();
        }
    }
}
