<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function products(){
        return $this->hasMany('App\product','category_id','id');

    }

    public function subCategory(){
        return $this->hasMany('App\category','category_id','id');
    }

    public function superCategory(){
        return $this->belongsTo('App\category','category_id','id');
    }

}
