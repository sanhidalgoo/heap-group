<?php

// Authors: Santiago Hidalgo, David Calle

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Beer;


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
        $newOrder = new Order();
        $newOrder->setOrderState(Order::$STATES['PENDING']);
        $newOrder->setPaymentMethod($request['paymentMethod']);
        $newOrder->setDepartment($request['department']);
        $newOrder->setCity($request['city']);
        $newOrder->setAddress($request['address']);
        $newOrder->setTotal(0);
        $newOrder->save();

        $beersInSession = $request->session()->get("beers"); //we get the ids of the beers stored in session
        $beersInCart = Beer::findMany(array_keys($beersInSession));

        $total = 0;
        foreach ($beersInCart as $beer) {
            $newOrderItem = new OrderItem();
            $beerQuantity = $beersInSession[$beer->getId()];
            $newOrderItem->setQuantity($beerQuantity);
            $newOrderItem->setSubtotal($beer->getPrice() * $beerQuantity);
            $newOrderItem->setBeerId($beer->getId());
            $newOrderItem->setOrderId($newOrder->getId());
            $newOrderItem->save();
            $total += $newOrderItem->getSubtotal();
        }

        $newOrder->setTotal($total);
        $newOrder->save();

        return redirect()->back()->with('success', __('orders.create.success'));
    }
}
