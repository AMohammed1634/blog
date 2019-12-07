<?php

namespace App\Http\Controllers;

use App\product;
use App\shoppingCart;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    //
    public function addToChart(product $product,User $user){
        $last = shoppingCart::where([['users_id',$user->id] , ['products_id',$product->id] ])->get();
        if($last->count() == 0) {
            //dd(auth()->user()->shoppingCart->count());
            $chart = new shoppingCart();
            $chart->quantity = 1;
            $chart->products_id = $product->id;
            $chart->users_id = $user->id;
            $chart->save();
            return array(auth()->user()->shoppingCart->count(),200);
        }
        else{
            return array('msg','alredy Added');
        }

    }

    public function view_cart(){
        return auth()->user()->shoppingCart->where('ordered','-1');
    }
}
