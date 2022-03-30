<?php

// Author: Santiago Hidalgo

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;
use App\Models\Order;
use App\Models\RefundOrder;

class RefundOrderController extends Controller
{
    public function index($orderId)
    {
        $viewData = [];
        $viewData['orderId'] = $orderId;
        return view('userspace.orders.refund')->with("viewData", $viewData);
    }

    public function save($orderId, Request $request)
    {
        $order = Order::find($orderId);
        $refundOrder = new RefundOrder();
        $refundOrder->setOrderId($orderId);
        $refundOrder->setMotive($request['motive']);
        $refundOrder->setRequestDate(date("Y-m-d H:i:s"));
        $refundOrder->setState(RefundOrder::$STATES['PENDING']);
        $refundOrder->save();
        $order->setOrderState(Order::$STATES['CANCELLED']);
        $order->save();

        return redirect()->route('user.orders.index');
    }
}
