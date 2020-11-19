<?php

namespace App\Http\Helpers;

use App\Grados;
use Illuminate\Database\Eloquent\Model;

class HelperGrados{

    public static function getGrados(){
        $grados = Grados::All();
        return $grados;
    }
}
