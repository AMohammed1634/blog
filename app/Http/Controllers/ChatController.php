<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Http\Controllers\Controller;
use App\message;
use App\User;
//use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\SendMessage;
use Illuminate\Http\Request;
use Illuminate\View\View;
//use App\Events\MessageSend;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(){

        $users = User::all();
        return \view("Chats.Chats",compact("users"));
    }
    public function fetchMessages(){
        return message::with("user")->get();
    }



    public function userMessages(User $sender, User $recever){
        $messages =  message::where([
            ['message_from',$sender->id],
            ["message_to",$recever->id]
        ])->orWhere([
            ['message_from',$recever->id],
            ["message_to",$sender->id]
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
            ['message_from',$recever->id],
            ["message_to",$sender->id]
        ])->get();
        foreach ($readedMessage as $msg){
            $msg->readed = 1;
            $msg->save();
        }
        return $messages;
    }

    public function messageSend(User $user, Request $request){
//        $message = message::create([
//            "message_from" => auth()->user()->id,
//            "mesage_to" => $user->id,
//            "message" => $request->message
//        ]);
        $message = new message();
        $message->message_from = auth()->user()->id;
        $message->message_to = $user->id;
        $message->message = $request->message;
        $message->save();
        broadcast(new MessageSend($message))->toOthers();
        // broadcast(new \App\Events\WebsocketDemoEvent("some Data Ahmed"));
        return response()->json([
            'status' => 'success'
        ]);
    }
}
