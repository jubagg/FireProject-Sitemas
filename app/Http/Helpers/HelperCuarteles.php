<?php

namespace App\Http\Helpers;

use App\Cuarteles;
use Illuminate\Database\Eloquent\Model;

class HelperCuarteles{

    public static function getCuarteles(){
        $cuarteles = Cuarteles::All();
        return $cuarteles;
    }

    public static function getCuartelesFed($id){
        $cuarteles = Cuarteles::where('cuarfed', '=', $id)->get();
        return $cuarteles;
    }
}
