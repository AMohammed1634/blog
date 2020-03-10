<?php

namespace App\Http\Controllers;

use App\Helper\FPGrowth;
use App\Helper\FPNode;
use App\Helper\FPTree;
use App\order;
use App\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $newCommerce = product::where('created_at','<>',null)->get();

        $result =$this->RunFPTreeAlgorithm(2, 0.7);
//        dd($result);
        $support = $result[0];
        $confidence = $result[1];
        $item = explode(",", $confidence[10][0]);
        /**
         * get related Products from
         */
        $products = [];
        foreach($confidence as $oneConfidence):
                $temp = [];
                $temp2 = [];
                $items = explode(",", $oneConfidence[0]);
                foreach ($items as $product):
                    $pro = product::find($product);
                    array_push($temp, $pro);
                endforeach;
                $items1 = explode(",",$oneConfidence[1]);
                foreach($items1 as $product):
                    $pro = product::find($product);
                    array_push($temp2, $pro);
                endforeach;
                $row = [$temp , $temp2,$oneConfidence[2]];
                array_push($products,$row);
        endforeach;
//        dd($products);
        return view('homeFPTree',[
            'newCommerce' => $newCommerce,
            'confidence' => $confidence,
            "roles" => $products
        ]);
    }



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

}
