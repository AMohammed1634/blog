<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    //
    public function products(){
        return $this->belongsTo('App\product','products_id','id');

    }

    public function users(){
        return $this->belongsTo('App\User','users_id','id');
    }
}
