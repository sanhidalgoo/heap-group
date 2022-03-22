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
        return view('userspace.beers.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $beer->getName();
            $viewData["beer"] = $beer;
            return view('userspace.beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }
}
