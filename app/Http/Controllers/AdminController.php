<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\order;
use App\product;
use App\shoppingCart;
use App\updatedProduct;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function dashboard(){

        $orders = order::latest('id')->get();
//        $orders = DB::table('orders')->latest('id')->limit(5)->whereNull('')->get();
        $users = User::all();
        $carts = shoppingCart::where('ordered','<>',-1)->get();
        $admins = User::where('roles_id',3)->get();
        $products = product::where('created_at','<>','Null')->get();
        $updatedProducts = updatedProduct::whereNull('price')->get();
        //return $products;
        return view('admin.dashboard',compact('orders',"users",'carts','admins','products',
            'updatedProducts'));
    }

}
