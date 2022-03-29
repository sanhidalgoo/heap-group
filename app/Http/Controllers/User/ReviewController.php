<?php

// Author: Santiago Hidalgo

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Review;

class ReviewController extends Controller
{
    public function create($beerId)
    {
        $viewData = [];
        $viewData["beersInCart"] = session()->get("beers") ?? [];
        $viewData['beerId'] = $beerId;
        return view('userspace.reviews.create')->with('viewData', $viewData);
    }

    public function save($beerId, Request $request)
    {
        Review::validate($request);
        $review = new Review();
        $review->setScore($request['score']);
        $review->setComment($request['comment']);
        $review->setBeerId($beerId);
        // TODO SET USER ID
        // $review->setUserId();
        dd($review);
        $review->save();
    }
}
