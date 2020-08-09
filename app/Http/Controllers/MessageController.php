<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function getMessages($userID, $authID){

        $messages =  message::where([
            ['message_from',$authID],
            ["message_to",$userID]
        ])->orWhere([
            ['message_from',$userID],
            ["message_to",$authID]
        ])->latest("id")->get();
        for($i=0 ;$i<count($messages);$i++){
            if($messages[$i]->message_from == auth()->user()->id)
                $messages[$i]->user = User::find($messages[$i]->message_to);
            else
                $messages[$i]->user = User::find($messages[$i]->message_from);
        }

        for($i=0;$i<count($messages)/2;$i++){
            $temp = $messages[$i];
            $messages[$i] = $messages[count($messages) - $i - 1];
            $messages[count($messages) - $i - 1] = $temp;
        }

        // marke the masages as readed
        $readedMessage = message::where([
            ['message_from',$userID],
            ["message_to",$authID]
        ])->get();
        foreach ($readedMessage as $msg){
            $msg->readed = 1;
            $msg->save();
        }
        return $messages;

    }
    public function AMassage(){
        return view("meassage.meassage");
    }
}
