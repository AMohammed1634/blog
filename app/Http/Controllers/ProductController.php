<?php

namespace App\Http\Controllers;

use App\Helper\FPGrowth;
use App\order;
use App\product;
use App\userImages;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function RunFPTreeAlgorithm(float $support, float $confidence){
        $orders = order::all();
        $transactions = [];
        foreach ($orders as $order){
            $row = [];
            foreach ($order->shoppingCart as $cart){
//                $row[]=$cart->products->name;
                array_push($row,$cart->products->id);
            }
            array_push($transactions, $row);
        }
        $fpgrowth = new FPGrowth($support, $confidence);
        $fpgrowth->run($transactions);
        $patterns = $fpgrowth->getPatterns();
        $rules = $fpgrowth->getRules();
        return [$patterns, $rules];

    }
    public function viewProduct(product $product){
        $result = $this->RunFPTreeAlgorithm(2,0.7);
        $support = $result[0];
        $confidence = $result[1];
        $item = explode(",", $confidence[10][0]);
        $roles = [];
        foreach($confidence as $oneConfidence):
            $temp = [];
            $temp2 = [];
            $items = explode(",", $oneConfidence[0]);
            foreach ($items as $pp):
                $pro = product::find($pp);
                array_push($temp, $pro);
            endforeach;
            $items1 = explode(",",$oneConfidence[1]);
            foreach($items1 as $pp):
                $pro = product::find($pp);
                array_push($temp2, $pro);
            endforeach;
            $row = [$temp , $temp2,$oneConfidence[2]];
            array_push($roles,$row);
        endforeach;
//        dd($roles);
        return view('user.singleProduct',compact('product', "roles"));
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

            $images = userImages::where([
                ['user_id',"=",auth()->user()->id ],
                [ 'product_id',"=",$product->id]
                    ]
            )->get();
//            dd($images);
            return redirect()->back()->with(['added' => 'Success' , 'images'=>$images]);
        }
        return redirect()->back()->with('added','Faild');
    }
}
