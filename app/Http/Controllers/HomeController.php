<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        return view('userspace.home.index')->with("viewData", $viewData);
    }

    public function admin()
    {
        $viewData = [];
        $viewData["options"] = [
            [
                "title" => __("menu.admin.beers.title"),
                "create" => __("menu.admin.beers.create"),
                "create-route" => route('admin.beers.create'),
                "index" => __("menu.admin.beers.index"),
                "index-route" => route('admin.beers.index'),
            ],
            [
                "title" => __("menu.admin.users.title"),
                "create" => __("menu.admin.users.create"),
                "create-route" => route('admin.users.create'),
                "index" => __("menu.admin.users.index"),
                "index-route" => route('admin.users.index'),
            ],
        ];

        return view('adminspace.home.index')->with('viewData', $viewData);
    }
}
