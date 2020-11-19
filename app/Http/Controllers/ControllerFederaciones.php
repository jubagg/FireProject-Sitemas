<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Federaciones;

class ControllerFederaciones extends Controller
{

    private $federaciones;

    public function __construct(Federaciones $federaciones){
        $this->federaciones = $federaciones;
        $this->middleware(['auth','usuarios', 'federacion', 'cuartel' ]);
    }

    public static function setFederacion(Request $request, $id = null){
        $federacion = $request->federacion;

        if(!is_null($id)){
            \Funciones::getKey($id);
            return redirect()->route('federaciones.dashboard',['federacion' => $federacion]);
            //return view('/federacion/dashboard');
        }else{
            \Funciones::getKey($federacion);
            return redirect()->route('federaciones.dashboard',['federacion' => $federacion]);
        }
    }

    public static function federacionDashboard(){
        return view('/federacion/dashboard');
    }
}
