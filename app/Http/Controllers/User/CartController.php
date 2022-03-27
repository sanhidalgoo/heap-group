<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $beers = Beer::all();
        $beersInCart = [];
        $beersInSession = $request->session()->get("beers"); //we get the ids of the beers stored in session
        $beersItems = [];
        if ($beersInSession) {
            $beersInCart = Beer::findMany(array_keys($beersInSession));
            foreach ($beersInCart as $beer) {
                array_push($beersItems, ['beer' => $beer, 'quantity' => $beersInSession[$beer['id']]]);
            }
        }
        $viewData = [];
        $viewData["beers"] = $beers;
        $viewData["beersInCart"] = $beersItems;

        return view('cart.index')->with("viewData", $viewData);
    }

    public function add($id, Request $request)
    {
        $beers = $request->session()->get("beers");
        $beers[$id] = 1;
        $request->session()->put('beers', $beers);
        return back();
    }

    public function increment($id, Request $request)
    {
        $beers = $request->session()->get("beers");
        $beer = Beer::findOrFail($id);
        if (($beer->getQuantity() > $beers[$id])) {
            $beers[$id]++;
            $request->session()->put('beers', $beers);
            return back();
        } else {
            return back()->with('error', "No puede pedir más");
        }
    }

    public function bill()
    {
        return view('cart.bill');
    }
    public function purchase(Request $request)
    {

        dd($request[]);
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
