<?php

namespace App\Http\Controllers;

use App\category;
use App\Helper\FPGrowth;
use App\order;
use App\product;
use App\productColors;
use App\userImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        //
//        for($i=0;$i<count($roles);$i++){
//
//            $var1 = $roles[$i][0];
//            $var2 = $roles[$i][1];
//            $con =  $roles[$i][2];
//            break;
//        }
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

    public function CreateProduct()
    {
        $brands = category::all()->where("category_id","<>",0);
        return view("admin.createProduct",compact('brands'));
    }
    public function SaveProduct(Request $request)
    {
        $request->validate(
            [
                "product_name" => "required|string",
                "product_des" => "required|string",
                "product_price" => "required|",
                "product_dis_price" => "required|",
                "brand_id" => "required|",
                'product_image' => 'required|image',
                'product_image_2' => 'required|image',
                'product_image_3' => 'required|image'
            ]
        );
        if($request->hasFile("product_image") && $request->hasFile("product_image_2")
            && $request->hasFile("product_image_3"))
        {
            $product = new product();
            $product->name = $request->product_name;
            $product->description = $request->product_des;
            $product->price = $request->product_price;
            $product->discounted_price = $request->product_dis_price;
            $product->category_id = $request->brand_id;

            $nameWithExt = $request->file('product_image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('product_image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('product_image')->storeAs('public/product_images',$imgName);
            $product->img = $imgName;

            $nameWithExt = $request->file('product_image_2')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('product_image_2')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('product_image_2')->storeAs('public/product_images',$imgName);
            $product->img_2 = $imgName;

            $nameWithExt = $request->file('product_image_3')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('product_image_3')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('product_image_3')->storeAs('public/product_images',$imgName);
            $product->thumbnail = $imgName;
            $product->save();

            $color = new productColors();
            $color->qty = 50;
            $color->colorCode =  "#DDD";
            $color->colorProduct = $product->img;
            $color->product_id = $product->id;
            $color->save();
            return redirect()->route("categories");
        }
        return redirect()->back();
    }

    public function BrowseProducts()
    {
        $products = product::latest("id")->get();//->paginate(10);
        return view("admin.browseProducts" , compact('products'));
    }
    public function deleteProduct(product $product)
    {
        $product->delete();
        return redirect()->back();
    }
    public function updateProduct(product $product)
    {
        $brands = category::all()->where("category_id","<>",0);
//        dd($brands);
        return view("admin.updateProduct",compact("product",'brands'));
    }
    public function saveUpdateProduct(Request $request,product $product)
    {
        $request->validate(
            [
                "product_name" => "required|string",
                "product_des" => "required|string",
                "product_price" => "required|",
                "product_dis_price" => "required|",
                "brand_id" => "required|",
                'product_image' => 'required|image',
                'product_image_2' => 'required|image',
                'product_image_3' => 'required|image'
            ]
        );
        if($request->hasFile("product_image") && $request->hasFile("product_image_2")
            && $request->hasFile("product_image_3")) {

            $product->name = $request->product_name;
            $product->description = $request->product_des;
            $product->price = $request->product_price;
            $product->discounted_price = $request->product_dis_price;
            $product->category_id = $request->brand_id;

            $nameWithExt = $request->file('product_image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('product_image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt . '_' . time() . '.' . $ext;
            $request->file('product_image')->storeAs('public/product_images', $imgName);
            $product->img = $imgName;

            $nameWithExt = $request->file('product_image_2')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('product_image_2')->getClientOriginalExtension();
            $imgName = $nameWithoutExt . '_' . time() . '.' . $ext;
            $request->file('product_image_2')->storeAs('public/product_images', $imgName);
            $product->img_2 = $imgName;

            $nameWithExt = $request->file('product_image_3')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('product_image_3')->getClientOriginalExtension();
            $imgName = $nameWithoutExt . '_' . time() . '.' . $ext;
            $request->file('product_image_3')->storeAs('public/product_images', $imgName);
            $product->thumbnail = $imgName;
            $product->save();

            return redirect()->route("products.browse_products");
        }
    }
}
