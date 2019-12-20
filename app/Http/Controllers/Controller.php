<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
//    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function callPythonTest(){

        $opts = array('http' =>
            array(
                'method'  => "GET",
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'content' => "ASD"
            )
        );
        $context  = stream_context_create($opts);
        $responseJson  = file_get_contents("http://127.0.0.1:5000/api/test/", false, $context);

        dd($responseJson);
        return "ASD";
    }
}
