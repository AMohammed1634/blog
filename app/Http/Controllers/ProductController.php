<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function viewProduct(product $product){
        return view('user.singleProduct',compact('product'));
        return $product;
    }

    public function getDesignView(product $product){
        return $product;
    }
}
