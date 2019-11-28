<?php

namespace App\Http\Controllers;
use App\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    //
    public function viewCategory(){
        //return category::all();
        $Allcategory = category::all()->where('category_id',0);// whtout pagination
        $category = category::where('category_id',0)->paginate(1);
        //return $category;
        return view('user.categoryPublic',compact('category','Allcategory'));
    }

    public function singleCategory(category $category){
        //return view('user.categoryPublic',compact('category'));
        return $category;
    }
    public function singleCategoryProducts(category $category){
        $valid = false;
        if(auth()->check()){
            $valid= true;
        }
        $response = [
            'valid' => $valid,

            'userID' => auth()->user()->id,

            'success' => true,

            'data'    => $category->products ,
            'isLogin' => auth()->check()

        ];


        return response()->json($response, 200);
        return $category->products;
    }

    public function searchPrice(category $category,$price){


        $response = [

            'success' => true,

            'data'    => $category->products->where('price','<=',$price)

        ];


        return response()->json($response, 200);
    }

}
