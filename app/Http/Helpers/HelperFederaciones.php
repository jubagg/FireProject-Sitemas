<?php

namespace App\Http\Helpers;

use App\Federaciones;
use Illuminate\Database\Eloquent\Model;

class HelperFederaciones{

    public static function getFederaciones(){
        $fed = Federaciones::All();
        return $fed;
    }
}
