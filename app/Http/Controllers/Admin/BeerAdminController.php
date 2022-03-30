<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Http\Requests\CreateBeerRequest;
use App\Http\Requests\UpdateBeerRequest;

class BeerAdminController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["beers"] = Beer::all();
        return view('adminspace.beers.index')->with("viewData", $viewData);
    }

    public function create()
    {
        return view('adminspace.beers.create');
    }

    public function save(CreateBeerRequest $request)
    {
        Beer::create($request->validated());
        return redirect()->back()->with('success', __('beers.create.success'));
    }

    public function delete($id)
    {
        try {
            $beer = Beer::destroy($id);
            return redirect()->route('admin.beers.index')->with('delete', __('beers.delete.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.beers.index');
        }
    }

    public function show($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] = $beer->getName();
            $viewData["beer"] = $beer;
            return view('adminspace.beers.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.beers.index');
        }
    }

    public function edit($id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] = $beer->getName();
            $viewData["beer"] = $beer;
            return view('adminspace.beers.edit')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.beers.index');
        }
    }

    public function update(UpdateBeerRequest $request, $id)
    {
        try {
            $beer = Beer::findOrFail($id);
            $beer->update($request->validated());
            return redirect()->route('admin.beers.index')->with('update', __('beers.update.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.beers.index');
        }
    }
}
