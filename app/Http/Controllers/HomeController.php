<?php

// Authors: Juan Sebastián Díaz

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $pokemonId = random_int(1, 700);
        $pokemon = Http::get('https://pokeapi.co/api/v2/pokemon/' . $pokemonId)->json();

        $viewData = [];
        $viewData['pokemon'] = $pokemon;

        return view('userspace.home.index')->with("viewData", $viewData);
    }

    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return back();
    }
}
