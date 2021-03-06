<?php

// Authors: Santiago Hidalgo

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateReviewRequest;
use App\Models\Beer;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ReviewController extends Controller
{
    public function create($beerId)
    {
        $beer = Beer::findOrFail($beerId);
        $viewData = [];
        $viewData['beer'] = $beer;
        return view('userspace.reviews.create')->with('viewData', $viewData);
    }

    public function save($beerId, CreateReviewRequest $request)
    {
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
        try {
            $beerId = Review::findOrFail($id)->getBeerId();
            $review = Review::destroy($id);
            return redirect()->route('user.beers.show', ['id' => $beerId])->with('delete', __('reviews.delete.success'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('user.beers.index');
        }
    }
}
