<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Beer;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\assertTrue;

class StarsRankingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTheCheckedStarsNumberIsCorrect()
    {
        $beer = Beer::all()->random(1)->first();
        $viewData = [];
        $viewData["subtitle"] = $beer->getName();
        $viewData["beer"] = $beer;
        $viewData["reviews"] = $beer->reviews()->with('user')->get();
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        $view = (string) view('userspace.beers.show')->with("viewData", $viewData);
        $stars = substr_count($view, 'ratingStar fa fa-star checked');
        assertTrue($stars == round($beer->getRating()));
    }
}
