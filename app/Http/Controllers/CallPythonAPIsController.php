<?php

namespace App\Http\Controllers;

use App\product;
use App\updatedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;

class CallPythonAPIsController extends Controller
{
    //
    private function callToApi(string $url,string $method, $data){
      $curl = curl_init();

      switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
      }

      // OPTIONS:
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: 111111111111111111111',
       'Content-Type: application/json',
      ));
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

      // EXECUTE:
      $result = curl_exec($curl);
      if(!$result){die("Connection Failure");}
      curl_close($curl);
      return $result;
    }
    public  function saveChanges(product $product){
        $url = "http://127.0.0.1:5000/api/";
        $method = "POST";
        $data = DB::table('user_images')->where([
            ['user_id','=',auth()->user()->id],
            ['offset_x','<>',-1],
            ['offset_y','<>',-1]
        ])->get();
        $s_img = [];
        foreach ($data as $item){
            $asd = ["img_src"=>"UpdatedProduct/".$item->img,
                "width"=>$item->obj_width,
                "height"=>$item->obj_height,
                "x"=>$item->offset_x,
                "y"=>$item->offset_y
            ];
            array_push($s_img,$asd);
        }
        $l_img = ["img_src"=>"product_images/". $product->img,
                    "width"=>500,
                    "height"=>510];
        $objJSON = [
            "l_img"=>$l_img,
            "s_img"=>$s_img
        ];
        $data =  (json_encode($objJSON));
        $data = str_replace('\\', "", $data);
        // $data = $objJSON;

//         return ($data);
        $response = $this->callToApi($url,$method,$data);
        $response = json_decode($response);
        /**
         * create new Item
         */
        $newProduct = new updatedProduct();
        $newProduct->user_id = auth()->user()->id;
        $newProduct->product_id = $product->id;
        $newProduct->img = $response->new;
        $newProduct->save();
        return "Object Save ";
    }
}
