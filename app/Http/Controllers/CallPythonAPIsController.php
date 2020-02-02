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
            ['offset_y','<>',-1],
            ["product_id","=",$product->id]
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
                    "width"=>420,
                    "height"=>468];
        $objJSON = [
            "l_img"=>$l_img,
            "s_img"=>$s_img
        ];
        $data =  (json_encode($objJSON));
        $data = str_replace('\\', "", $data);
        // $data = $objJSON;

//         return ($data);
        $response = $this->callToApi($url,$method,$data);
//        $response = json_decode($response);
        return $response;
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
    public function addText(product $product,Request $request){
        $color = "";$asd = $request->color;
        $asd = str_ireplace("#","",$asd);

        /**
         * convert hash hex color formate
         */
        $split_hex_color = str_split( $asd, 2 );
        $RGBColor = [
            hexdec( $split_hex_color[2] ),
            hexdec( $split_hex_color[1] ),

            hexdec( $split_hex_color[0] )
        ];
        $img = ["img_src"=>"product_images/". $product->img,
            "width"=>420,
            "height"=>468,
            "x"=>$request->x,
            "y"=>$request->y + 20,
            "font_size"=>1,
            "font_family"=>1,
            "font_color"=>$RGBColor
        ];
        $objJSON = [
            "img"=>$img,
            "text"=>$request->txt
        ];
        $data =  (json_encode($objJSON));
        $url = "http://127.0.0.1:5000/api/addText/";
        $method = "POST";

        $response = $this->callToApi($url,$method,$data);
//        $response = json_decode($response);
        return $response;
    }
    public function saveResult(Request $request, product $product){

        $images = DB::table('user_images')->where([
            ['user_id','=',auth()->user()->id],
            ['offset_x','<>',-1],
            ['offset_y','<>',-1],
            ["product_id","=",$product->id]
        ])->get();
        $s_img = [];
        foreach ($images as $item){
            $asd = ["img_src"=>"UpdatedProduct/".$item->img,
                "width"=>$item->obj_width,
                "height"=>$item->obj_height,
                "x"=>$item->offset_x,
                "y"=>$item->offset_y
            ];
            array_push($s_img,$asd);
        }

        $data =[];

        if($request->flage == 1) {
            $asd1 = str_ireplace("#","",$request->color);

            /**
             * convert hash hex color formate
             */
            $split_hex_color = str_split( $asd1, 2 );
            $RGBColor = [
                hexdec( $split_hex_color[2] ),
                hexdec( $split_hex_color[1] ),

                hexdec( $split_hex_color[0] )
            ];
            $data = [
                "container" => [
                    "height" => 468,
                    "img_src" => "product_images/" . $product->img,
                    "width" => 420
                ],
                "images" => $s_img,
                "word" => [
                    "font_color" => $RGBColor,
                    "font_family" => 1,
                    "font_size" => 1,
                    "text" => $request->txt,
                    "x" => $request->x,
                    "y" => $request->y
                ],
                "flage"=>1
            ];
        }else{
            $data = [
                "container" => [
                    "height" => 468,
                    "img_src" => "product_images/" . $product->img,
                    "width" => 420
                ],
                "images" => $s_img,
                "word" => "NoWord",
                "flage" => 0
                ];
        }
        $data =  (json_encode($data));
//        $data = str_replace('\\', "", $data);
        $response = $this->callToApi("http://127.0.0.1:5000/api/save/result/","POST",$data);
//        return "Ahmed";
        $response = json_decode($response,true);
//        return $response['name'];
        if($response['response_code'] == 10){
            $newProduct = new updatedProduct();
            $newProduct->user_id = auth()->user()->id;
//            $newProduct->product_id = $product->id;
            $newProduct->img = $response['name'];
            $newProduct->save();
            return "Object Save ";
        }
        return $response;
    }
}
