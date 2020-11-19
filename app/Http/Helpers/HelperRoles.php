<?php

namespace App\Http\Helpers;

use App\Roles;
use Illuminate\Database\Eloquent\Model;

class HelperRoles{

    public static function getRoles(){
        $roles = Roles::All();
        return $roles;
    }
}
