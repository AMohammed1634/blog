<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Events\TypingMessage;
use App\Http\Controllers\Controller;
use App\message;
use App\User;
//use BeyondCode\LaravelWebSockets\Dashboard\Http\Controllers\SendMessage;
use App\writing;
use Illuminate\Http\Request;
use Illuminate\View\View;
//use App\Events\MessageSend;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(User $user = null){


        if($user == null){

            $user = -1;
        }
        $users = User::all();
        return \view("Chats.Chats",compact("users","user"));
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
    public function typing(User $userID, User $authID){
        $num = writing::where([
            ['write_to',$userID->id],
            ['write_from',$authID->id]
        ])->get();
        if(count($num) > 0){
            $num[0]->is_writing_now = true;
            $num[0]->save();
            broadcast(new TypingMessage($num[0]))->toOthers();
            return response()->json([
                "status" =>"typing"
            ]);
        }
        $num = new writing();
        $num->is_writing_now = true;
        $num->write_from = $authID->id;
        $num->write_to = $userID->id;
        $num->save();
        broadcast(new TypingMessage($num))->toOthers();
        return response()->json([
            "status" =>"typing"
        ]);
    }

    public function typingFalse(User $userID, User $authID){
        $num = writing::where([
            ['write_to',$userID->id],
            ['write_from',$authID->id]
        ])->get();
        if(count($num) > 0){
            $num[0]->is_writing_now = false;
            $num[0]->save();
            broadcast(new TypingMessage($num[0]))->toOthers();
            return $num[0];
        }
        $num = new writing();
        $num->is_writing_now = false;
        $num->write_from = $authID->id;
        $num->write_to = $userID->id;
        $num->save();
        broadcast(new TypingMessage($num))->toOthers();
        return $num;
    }
}
