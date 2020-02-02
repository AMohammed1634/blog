<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\order;
use Illuminate\Http\Request;
use App\Helper\FPGrowth;
use App\Helper\FPNode;
use App\Helper\FPTree;

class DMController extends Controller
{
    //
    /**
     * @return mixed
     * applay FPTree algorthim in orders
     */
    public function FPTreeAlgorithm(){

        $arr = $this->RunFPTreeAlgorithm(2,0.7);
        $patterns = $arr[0];
        $rules = $arr[1];
        return view('admin.FPTree',compact('patterns','rules'));

    }
    private function RunFPTreeAlgorithm(float $support, float $confidence){
        $orders = order::all();
        $transactions = [];
        foreach ($orders as $order){
            $row = [];
            foreach ($order->shoppingCart as $cart){
//                $row[]=$cart->products->name;
                array_push($row,$cart->products->name);
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
