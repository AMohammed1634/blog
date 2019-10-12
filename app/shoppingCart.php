<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shoppingCart extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User','users_id','id');
    }

    public function products(){
        return $this->belongsTo('App\product','products_id','id');
    }

    public function orders(){
        return $this->belongsTo('App\order','orders_id','id');
    }
}
