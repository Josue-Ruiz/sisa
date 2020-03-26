<?php

namespace App\Helpers;
use Storage;
use DB;
use Illuminate\Http\Response;

class Content{

    public static function get_municipalities($id){
        $sql = "call DA_spSIVADB_get_Municipios_x_Jurisdiccion('1','".$id."')";
        $result = DB::select($sql,array(0,100));
        return $result; 
    }

    public static function get_image_profile(){
        $img = Storage::disk('users')->get('2.png');
        return new Response($img,200);
    }

}