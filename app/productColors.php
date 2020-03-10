<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productColors extends Model
{
    //
    public function product(){
        return $this->belongsTo('App\product','Product_id','id');
    }
    public function productSize(){
        return $this->hasMany('App\productSizes','Product_color_id','id');
    }
}
