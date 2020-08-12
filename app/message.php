<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
    protected $guarded = [];
    protected $table = "messages";
    public function messageSender(){
        return $this->belongsTo(User::class ,"message_from","id");
    }
    public function messageRecever(){

    }
}
