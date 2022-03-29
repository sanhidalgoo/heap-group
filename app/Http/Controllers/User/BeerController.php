<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["beers"] = Beer::all();
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        return view('userspace.beers.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] = $beer->getName();
            $viewData["beer"] = $beer;
            $viewData["reviews"] = $beer->reviews()->get();
            $viewData["beersInCart"] = session()->get("beers") ?? [];
            return view('userspace.beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }

    public function ranking()
    {
        $beers = Beer::all();
        $beers->sortBy(function ($beer) {
            return $beer->getAverageRating();
        });
        $viewData = [];
        $viewData["beers"] = $beers;
        dd($viewData);
    }
}
