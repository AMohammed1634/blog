<?php

namespace App\Http\Controllers;

use App\product;
use App\userImages;
use Illuminate\Http\Request;

class UserImagesController extends Controller
{
    //
    public function updateRow(product $product,Request $request){

        $userImage = userImages::find($request->imgID);
        $userImage->obj_height = $request->height ;
        $userImage->obj_width = $request->width;
        $userImage->offset_x = $request->x < 0 ? -1 :$request->x ;
        $userImage->offset_y = $request->y < 0 ? -1 : $request->y;
        $userImage->save();
        $response = [
            "message"=> "A7A"
        ];

        return response()->json($response, 200);
    }
}
