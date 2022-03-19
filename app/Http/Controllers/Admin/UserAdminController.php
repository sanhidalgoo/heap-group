<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserAdminController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["users"] = User::all();
        return view('admin.users.index')->with("viewData", $viewData);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function save(Request $request)
    {
        User::validate($request);
        Ueer::create($request->only([
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
        return redirect()->back()->with('success', __('users.create.success'));
    }

    public function delete($id)
    {
        try {
            $user = User::destroy($id);
            return redirect()->route('admin.users.index')->with('delete', __('users.delete.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }

    public function show($id)
    {
        try {
            $beer = User::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $user->getName();
            $viewData["user"] = $user;
            return view('admin.users.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }

    public function edit($id)
    {
        // Like show?
    }

    public function update($id)
    {
        // Like edit?
    }
}
