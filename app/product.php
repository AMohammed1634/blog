<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    public function categories(){
        return $this->belongsTo('App\category','category_id','id');
    }

    public function reviews(){
        return $this->hasMany('App\review','products_id','id');

    }

    public function wishLists(){
        return $this->hasMany('App\wishList','products_id','id');
    }
    public function shoppingCart(){
        return $this->hasMany('App\shoppingCart','products_id','id');
    }
}
