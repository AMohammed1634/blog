<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    public function users(){
        return $this->belongsTo('App\User','users_id','id');
    }
    public function shoppingCart(){
        return $this->hasMany('App\shoppingCart','orders_id','id');
    }
}
