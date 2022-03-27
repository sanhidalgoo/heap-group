<?php

// Authors: Santiago Hidalgo

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
        try {
            $beers = $request->session()->get("beers");
            $beer = Beer::findOrFail($id);
            if (($beer->getQuantity() > $beers[$id])) {
                $beers[$id]++;
                $request->session()->put('beers', $beers);
                return back();
            } else {
                return back()->with('error', __('cart.increment.unallowed'));
            }
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.cart.index');
        }
    }

    public function decrement($id, Request $request)
    {
        $beers = $request->session()->get("beers");
        if ($beers[$id] > 0) {
            $beers[$id]--;
            if ($beers[$id] == 0) {
                unset($beers[$id]);
            }
            $request->session()->put('beers', $beers);
            return back();
        }
    }

    public function removeAll(Request $request)
    {
        $request->session()->forget('beers');
        return back();
    }
}
