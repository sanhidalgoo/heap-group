<?php

namespace App\Http\Controllers;

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
        return view('beers.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $beer->getName();
            $viewData["beer"] = $beer;
            return view('beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('beers.index');
        }
    }

    public function create()
    {
        return view('beers.create');
    }

    public function save(Request $request)
    {
        Beer::validate($request);
        Beer::create($request->only([
            'name',
            'price',
            'brand',
            'origin',
            'abv',
            'ingredient',
            'flavor',
            'format',
            'price',
            'details',
            'quantity_available',
            'image_url',
        ]));
        return redirect()->back()->with('success', __('beers.create.success'));
    }

    public function delete($id)
    {
        try {
            $beer = Beer::destroy($id);
            return redirect()->route('beers.index')->with('delete', __('beers.delete.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('beers.index');
        }
    }
}