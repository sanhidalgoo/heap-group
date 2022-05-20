<?php

// Authors: Juan Sebastián Díaz

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class HomeController extends Controller
{
    public function index()
    {
        $pokemon_id = random_int(1, 700);
        $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/' . $pokemon_id)->json();

        $viewdata = [
            'pokemon' => $pokemon
        ];

        return view('userspace.home.index')->with("viewData", $viewdata);
    }
}
