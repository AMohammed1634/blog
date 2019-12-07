<?php

namespace App\Http\Controllers;

use App\product;
use App\userImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function viewProduct(product $product){
        return view('user.singleProduct',compact('product'));
        return $product;
    }

    public function getDesignView(product $product){
        if(userImages::where(
            ['user_id'=>auth()->user()->id ,
                'product_id'=>$product->id]
        )->count() != 0){
            return view('user.UpdateProduct',compact('product'))->with([

                'images' => userImages::where(
                    ['user_id'=>auth()->user()->id ,
                        'product_id'=>$product->id]
                )->get()
            ]);
        }

        return view('user.UpdateProduct',compact('product'));
    }
    public function addImage(product $product,Request $request){
        $request->validate([
            'image' => 'required|image'
        ]);

        if($request->hasFile('image')){
            $nameWithExt = $request->file('image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/UpdatedProduct',$imgName);
//            dd($imgName);

            userImages::create(['user_id'=>auth()->user()->id ,
                'product_id' => $product->id ,
                'img'=>$imgName]);

            $images = userImages::where(
                ['user_id'=>auth()->user()->id ,
                'product_id'=>$product->id]
            )->get();
//            dd($images);
            return redirect()->back()->with(['added' => 'Success' , 'images'=>$images]);
        }
        return redirect()->back()->with('added','Faild');
    }
}
