<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\order;
use App\product;
use App\shoppingCart;
use App\updatedProduct;
use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

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
        $updatedProducts = updatedProduct::whereNull('price')->latest("id")->get();
        //return $products;
        return view('admin.dashboard',compact('orders',"users",'carts','admins','products',
            'updatedProducts'));
    }
    public function messages(){
        $users = User::all();
        /*\App\message::all*/
        /*DB::table('')->where('')->groupBy()*/
        return view('admin.adminMessages',compact('users'));
        return view("admin.adminMessages");
    }

    public function allOrders()
    {
        $orders = order::latest('id')->get();
        return view('admin.viewDetails',compact('orders'));
    }
//allUpdatedProducts
    public function allUpdatedProducts()
    {
        $updatedProducts = updatedProduct::latest("id")->paginate(5);
        return view('admin.updatedProducts',compact('updatedProducts'));
    }
    public function saveChanges(Request $request,updatedProduct $product){
        $product->price = $request->price;
        $product->save();
//        $p = product::find($product->id);
//        $p->price = $request->price;
//        $p->save();
//        dd($product);
        return redirect()->back();
    }
}
