<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productSizes extends Model
{
    //
    public function productColors(){
        return $this->belongsTo('App\productColors','Product_color_id','id');
    }
}
