<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

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
            $user = User::findOrFail($id);
            $viewData = [];
            $viewData["subtitle"] =  $user->getName();
            $viewData["user"] = $user;
            return view('adminspace.users.edit')->with("viewData", $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($request->validated());
            return redirect()->route('admin.users.index')->with('update', __('users.update.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index');
        }
    }
}
