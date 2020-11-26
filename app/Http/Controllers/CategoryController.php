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
        //dd($category);
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

            'success' => true,

            'data' => $category->products,
            'isLogin' => auth()->check()
        ];
        if(auth()->check()) {
            $response = [
                'valid' => $valid,

                'userID' => auth()->user()->id,

                'success' => true,

                'data' => $category->products,
                'isLogin' => auth()->check()

            ];
        }

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

    public function CreateCategory(){
        $isCategory = true;
        return view('admin.createCategory',compact('isCategory'));
    }
    public function SaveCategory(Request $request)
    {

        $request->validate([
            "category_name" =>"required|string",
            "category_des" =>"required|string"
        ]);
        category::create(
            [
                "name" => $request->category_name,
                "description"    => $request->category_des,
                "category_id" => 0
            ]
        );
        return redirect()->route("categories");
    }
    public function CreateBrand()
    {
        $categories = category::all()->where("category_id",0);
        $isCategory = false;
        return view('admin.createBrand',compact('isCategory','categories'));
    }
    public function SaveBrand(Request $request)
    {
        $request->validate([
            "brand_name" =>"required|string",
            "brand_des" =>"required|string",
            "category_id" => "required|string"
        ]);
        category::create(
            [
                "name" => $request->brand_name,
                "description"    => $request->brand_des,
                "category_id" => $request->category_id
            ]
        );
        return redirect()->route("categories");
    }
    public function BrowseBrand()
    {
        $categories = category::all()->where("category_id",0);
        $brandes = category::all()->where("category_id",'<>',0);
        return view("admin.browseBrands",compact('categories','brandes'));
    }
}
