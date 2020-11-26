<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use App\productColors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductColorsController extends Controller
{
    //
    public function addColor(product $product)
    {

        return view("admin.addProductColor",compact('product'));
    }
    public function SaveColor(Request $request,product $product)
    {

        if($request->hasFile("image"))
        {
            $color = new productColors();
            $color->qty = $request->qty;
            $color->colorCode = $request->color;
            $color->product_id = $product->id;

            $nameWithExt = $request->file('image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/product_images',$imgName);
            $color->colorProduct = $imgName;

            $color->save();
            return redirect()->route("products.browse_products");
        }
    }
}
