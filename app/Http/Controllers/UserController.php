<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class UserController extends Controller
{
    //
    public function viewProfile(User $user){
        if($user->id != auth()->user()->id){
            if(auth()->user()->roles_id  == 3){
                return view('user.UserProfile',compact('user'));
            }
            $user = User::find(auth()->user()->id);
            return view('user.UserProfile',compact('user'));
        }
        return view('user.UserProfile',compact('user'));

    }
    public function changeImage(Request $request, User $user){
        if(auth()->check() && $user->id != auth()->user()->id)
            return redirect()->back();
        $request->validate([
            'image' => 'required|image'
        ]);

        if($request->hasFile('image')){
            $nameWithExt = $request->file('image')->getClientOriginalName();
            $nameWithoutExt = pathinfo($nameWithExt,PATHINFO_FILENAME);
            $ext = $request->file('image')->getClientOriginalExtension();
            $imgName = $nameWithoutExt.'_'.time().'.'.$ext;
            $request->file('image')->storeAs('public/profile_images',$imgName);
            $user->img = $imgName;
            $user->save();

            return redirect()->back();
        }
        return redirect()->back();
    }
}
