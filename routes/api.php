<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//http://127.0.0.1:8000/api/ahmed
Route::get("/ahmed",function (){
    return "ASD";
});

Route::get("/messages/getMessage/{fromUser}/{toUser}","APIsController@getMessages")->name("getMessages");
