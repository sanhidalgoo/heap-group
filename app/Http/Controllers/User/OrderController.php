<?php

// Authors: Santiago Hidalgo, David Calle

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Beer;
use App\Interfaces\ReportFile;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', '=', Auth::id())->get();
        $viewData = [];

        $viewData["orders"] =  $orders;
        return view('userspace.orders.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $order = Order::where('user_id', '=', Auth::id())->where('id', '=', $id)->first();
            if ($order == null) {
                throw new ModelNotFoundException();
            }
            $viewData = [];
            $viewData["subtitle"] =  $order->getId();
            $viewData["order"] = $order;
            $viewData["orderItems"] = $order->orderItems()->get();
            return view('userspace.orders.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.orders.index');
        }
    }

    public function save(CreateOrderRequest $request)
    {
        $newOrder = new Order();
        $newOrder->setOrderState(Order::$STATES['PENDING']);
        $newOrder->setPaymentMethod($request['paymentMethod']);
        $newOrder->setDepartment($request['department']);
        $newOrder->setCity($request['city']);
        $newOrder->setAddress($request['address']);
        $newOrder->setUserId(Auth::id());
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

        $user = User::find(Auth::id());

        if ($total > $user->getCashAvailable()) {
            $newOrder->delete();
            return redirect()->back()->with('error', __('orders.create.not.funds'));
        }

        $user->setCashAvailable($user->getCashAvailable() - $total);
        $user->save();

        $newOrder->setTotal($total);
        $newOrder->save();

        session()->forget("beers");

        return redirect()->back()->with('success', __('orders.create.success'));
    }

    public function download($id, $type)
    {
        $order = Order::findOrFail($id);
        $viewData = [];
        $viewData["subtitle"] =  $order->getId();
        $viewData["order"] = $order;
        $viewData["orderItems"] = $order->orderItems()->get();

        $report = app(ReportFile::class, ['type' => $type]);
        return $report->download('TheCraftBeer - Order #' . $id, $viewData);
    }
}
