<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BeerCollection;
use App\Http\Controllers\Controller;
use App\Models\Beer;

class BeerApiV1 extends Controller
{
    public function index()
    {
        return new BeerCollection(Beer::all());
    }

    public function paginate()
    {
        return new BeerCollection(Beer::paginate(5));
    }
}
