<?php

namespace App\Http\Controllers;

use App\order;
use App\shoppingCart;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function place_order(User $user){

        $carts = $user->shoppingCart->where('ordered',-1);
        $total = 0;
        $order = new order();
        $order->users_id = $user->id;
        $order->total_amount = $total;
        $order->shopping_id = random_int(1,100000000);
        $order->save();
        foreach ($carts as $cart){
            $cart->orders_id = $order->id;
            $cart->ordered = 0;
            $cart->update();

            $total += $cart->quantity * $cart->products->price;
        }
        $order->total_amount = $total;
        $order->update();
//        dd($order->id);
        $carts = shoppingCart::where([
            ['ordered',0],
            ['users_id',$user->id],
            ['orders_id',8]
        ])->get();
//        dd($carts);
        return view('user.Invoice',compact('order','carts'));
    }

    public function invoice_print(User $user, order $order){
        return view('user.Invoice_print',compact('order','user'));
    }
}
