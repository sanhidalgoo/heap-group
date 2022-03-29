<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $beers = Beer::query();

        if ($request->has('minPrice') && !empty($request->input('minPrice'))) {
            $beers = $beers->where('price', '>', $request->minPrice);
            $viewData['minPrice'] = $request->minPrice;
        }
        $viewData["beers"] = $beers->get();
        return view('userspace.beers.index')->with("viewData", $viewData);
    }

    public function filter()
    {
        $viewData = [];
        $viewData["beers"] = Beer::where('price', '<', 2250)->get();
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] = $beer->getName();
            $viewData["beer"] = $beer;
            $viewData["reviews"] = $beer->reviews()->get();
            return view('userspace.beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }
}
