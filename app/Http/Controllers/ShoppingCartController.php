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
        $last = shoppingCart::where([['users_id',$user->id] , ['products_id',$product->id],
            ['ordered',-1]])->get();
        if($last->count() == 0) {
            //dd(auth()->user()->shoppingCart->count());
            $chart = new shoppingCart();
            $chart->quantity = 1;
            $chart->products_id = $product->id;
            $chart->users_id = $user->id;
            $chart->save();
            return array(auth()->user()->shoppingCart->where('ordered',-1)->count(),200);
        }
        else{
            return array('msg','alredy Added');
        }

    }

    public function view_cart(){
        $carts = auth()->user()->shoppingCart->where('ordered','-1');
        return view('user.cart',compact('carts'));
        return auth()->user()->shoppingCart->where('ordered','-1');
    }
    public function checkout(User $user){
        return view("user.checkout",compact('user'));
    }
    public function delete_cart(shoppingCart $cart){
        $cart->delete();
        return redirect()->back();
    }
}
