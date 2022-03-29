<?php

// Author: Santiago Hidalgo

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Models\Beer;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

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
        $review->setUserId(Auth::id());
        $review->save();

        return redirect()->route('user.beers.show', ['id' => $beerId])->with('success', __('reviews.create.success'));
    }

    public function delete($id)
    {
        $viewData = [];
        $viewData["beersInCart"] = session()->get("beers") ?? [];

        try {
            $beerId = Review::findOrFail($id)->getBeerId();
            $review = Review::destroy($id);
            return redirect()->route('user.beers.show', ['id' => $beerId])->with('delete', __('reviews.delete.success'))->with('viewData', $viewData);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }
}
