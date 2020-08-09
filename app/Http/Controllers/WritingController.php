<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\writing;
use Illuminate\Http\Request;

class WritingController extends Controller
{
    //
    public function userWriteing($userID, $authID){
//        return "Ahmed";
        $num = writing::where([
            ['write_to',$userID],
            ['write_from',$authID]
        ])->get();
        if(count($num) > 0){
            $num[0]->is_writing_now = true;
            $num[0]->save();
            return "Writing";
        }
        $writing = new writing();
        $writing->is_writing_now = true;
        $writing->write_from = $authID;
        $writing->write_to = $userID;
        $writing->save();
        return "Writing";
    } public function userWriteingFalse($userID, $authID){
        $num = writing::where([
            ['write_to',$userID],
            ['write_from',$authID]
        ])->get();
        if(count($num) > 0){
            $num[0]->is_writing_now = false;
            $num[0]->save();
            return "not Writing";
        }
        $writing = new writing();
        $writing->is_writing_now = false;
        $writing->write_from = $authID;
        $writing->write_to = $userID;
        $writing->save();
        return "not Writing";
    }
    public function isWriting( $authID){
        $writing = writing::where([

            ['write_to',$authID]
        ])->latest('id')->get();
        return "$writing";
    }
}
