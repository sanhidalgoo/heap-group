<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerController extends Controller
{
    /**
     * Returns the view of the main beer page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $viewData = [];
        $viewData["beers"] = Beer::all();
        return view('beers.index')->with("viewData", $viewData);
    }

    /**
     * Returns the view of specific beer or redirect to home.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $beer["name"];
            $viewData["beer"] = $beer;
            return view('beers.show')->with("viewData", $viewData);
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('beers.index');
        }
    }

    /**
     * Returns the view of the create beer page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('beers.create');
    }

    /**
     * Saves a item in beer list.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|gte:0',
            'brand' => 'required|max:255',
            'origin' => 'required|max:255',
            'abv' => 'required|numeric|gte:0|lte:1',
            'ingredient' => 'required|max:255',
            'flavor' => 'required|max:255',
            'format' => 'required|max:255',
            'price' => 'required|numeric',
            'details' => '',
            'quantity_available' => 'required|numeric',
            'image_url' => 'required|max:2048',
        ]);
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

    /**
     * Deletes an item from beer list.
     *
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $beer->delete();
            return redirect()->route('beers.index')->with('delete', __('beers.delete.success'));
        }
        catch (ModelNotFoundException $e) {
            return redirect()->route('beers.index');
        }
    }
}
