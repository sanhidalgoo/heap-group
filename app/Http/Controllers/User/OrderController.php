<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $viewData = [];
        $viewData["orders"] =  $orders;
        return view('userspace.orders.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $order = Order::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $order->getId();
            $viewData["order"] = $order;
            return view('userspace.orders.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.orders.index');
        }
    }

    public function save(Request $request)
    {
        Order::validate($request);
        $orderItems = $request['orderItems'];
        foreach ($orderItems as $orderItem) {
            OrderItem::validate($orderItem);
        }

        $newOrder = new Order();
        $newOrder->setTotal($request['total']);
        $newOrder->setOrderState('created');
        $newOrder->setPaymentMethod($request['paymentMethod']);
        $newOrder->setDepartment($request['department']);
        $newOrder->setCity($request['city']);
        $newOrder->setAddress($request['address']);
        $newOrder->create();

        foreach ($orderItems as $orderItem) {
            $newOrderItem = new OrderItem();
            $newOrderItem->setQuantity($orderItem['quantity']);
            $newOrderItem->setSubtotal($orderItem['subtotal']);
            $newOrderItem->setBeer($orderItem['beer']);
            $newOrderItem->setOrder($newOrder->getId());
            $newOrderItem->create();
        }

        return redirect()->back()->with('success', __('orders.create.success'));
    }
}
