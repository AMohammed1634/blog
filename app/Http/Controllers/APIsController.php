<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\message;
use Illuminate\Http\Request;

class APIsController extends Controller
{
    //
    public function getMessages($fromUser, $toUser){
        $messages = message::where([
            ['message_from',$fromUser],
            ['message_to',$toUser]
        ])->latest('id')->limit(10)->get();

        return $messages;
    }
}
