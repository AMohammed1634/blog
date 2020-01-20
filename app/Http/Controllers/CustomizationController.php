<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use App\userImages;
use Illuminate\Http\Request;

class CustomizationController extends Controller
{
    //
    public function viewCustomizationLayout(product $product){
//        dd($product);
        $images = userImages::where(
            [
                ["user_id","=",auth()->user()->id],
                ["product_id","=",$product->id]
            ]
        )->get();
//        dd($images);
        return view("user.customization",compact("product","images"));
    }
}
