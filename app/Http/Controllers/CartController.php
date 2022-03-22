<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Order;
use App\Models\OrderItem;


class CartController extends Controller
{
    public function index(Request $request)
    {
        $beers = Beer::all();
        $beersInCart = [];
        $beersInSession = $request->session()->get("beers"); //we get the ids of the beers stored in session
        if ($beersInSession) {
            $beersInCart = Beer::findMany(array_keys($beersInSession));
        }
        $viewData = [];
        $viewData["beers"] = $beers;
        $viewData["beersInCart"] = $beersInCart;

        return view('cart.index')->with("viewData", $viewData);
    }

    public function add($id, Request $request)
    {
        $beers = $request->session()->get("beers");
        $beers[$id] = $id;
        $request->session()->put('beers', $beers);
        return back();
    }

    public function bill(){
        return view('cart.bill');
    }
    public function purchase(Request $request)
    {


        $beersInSession = $request->session()->get("beers");

        $beers = Beer::findMany(array_keys($beersInSession));
        $order = new Order();
        $order->setTotal(0);
        $order->setOrderState("PENDING");
        $order->setPaymentMethod($request['paymentMethod']);
        $order->setDepartment($request['department']);
        $order->setCity($request['city']);
        $order->setAddress($request['address']);
        $order->save();
        $total = 0;

        foreach ($beers as $key => $beer) {
            $item = new OrderItem();
            $item->setQuantity(1);
            $item->setBeerId($beer->getId());
            $item->setSubtotal($beer->getPrice());
            $item->setOrderId($order->getId());
            $item->save();
            $total = $total + $beer->getPrice();
        }

        $order->setTotal($total);
        $order->save();

        dd("Felicitaciones");
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('beers');
        return back();
    }
}
