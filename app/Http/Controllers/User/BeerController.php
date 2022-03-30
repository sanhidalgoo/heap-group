<?php

// Author: Juan S. Díaz

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
        $beers = Beer::filter()->get();
        $viewData["beers"] = $beers;
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        $viewData = array_merge($viewData, $request->all());
        return view('userspace.beers.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] = $beer->getName();
            $viewData["beer"] = $beer;
            $viewData["reviews"] = $beer->reviews()->with('user')->get();
            $viewData["beersInCart"] = session()->get("beers") ?? [];
            return view('userspace.beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }

    public function ranking()
    {
        $beers = Beer::all();
        $beers = $beers->sortBy(function ($beer) {
            return $beer->getRating();
        }, 0, true);

        $viewData = [];
        $viewData["beers"] = $beers;
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        return view('userspace.beers.ranking')->with("viewData", $viewData);
    }
}
