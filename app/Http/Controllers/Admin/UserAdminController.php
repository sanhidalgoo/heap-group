<?php

namespace App\Http\Controllers\Admin;

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
        return view('adminspace.users.index')->with("viewData", $viewData);
    }

    public function create()
    {
        return view('adminspace.users.create');
    }

    public function save(Request $request)
    {
        User::validate($request);
        User::create($request->only([
            'name',
            'email',
            'password',
            'role',
            'birthdate',
            'address',
            'cash_available',
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
            return view('adminspace.users.show')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }

    public function edit($id)
    {
        try {
            $beer = User::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $user->getName();
            $viewData["user"] = $user;
            return view('adminspace.users.edit')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }

    public function update(Request $request)
    {
        try {
            User::validate($request);
            User::findOrFail($id)->update($request->only([
                'name',
                'email',
                'password',
                'role',
                'birthdate',
                'address',
                'cash_available',
            ]));
            return redirect()->route('admin.users.index')->with('delete', __('users.delete.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }
}
