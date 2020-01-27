<?php

namespace App\Http\Controllers;

use App\product;
use App\review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function addReview(product $product, Request $request){
        $review = new review();
        $review->review = $request->message;
        $review->rating = $request->rate;
        $review->products_id = $product->id;
        $review->users_id = auth()->user()->id;
        $review->save();
        return redirect()->back();
    }
}
