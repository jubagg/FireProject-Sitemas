<?php

namespace App\Http\Helpers;

class HelperFunciones{

    public static function getKey($fed = null){

        $user = \Auth::user();
        $keyses =$user->lp .'_'.$user->cuartel.'_'.$user->federacion;
        if(!is_null($fed)){
            session([ $keyses => $fed]);
        }else{
            session([ $keyses => $user->federacion]);
        }
        return $keyses;
    }

    public static function limpiarRequest($array, $id= null){
        $arrayproc = [];
        foreach ($array as $key => $value) {
            if($key != '_token'){
                if($value == 'Seleccionar'){
                    $value = null;
                    $arrayproc = array_merge($arrayproc, $array = array($key => $value));
                }else{
                    $arrayproc = array_merge($arrayproc, $array = array($key => $value));
                }
            }
        }
        if($id != null){
            $arrayproc = array_merge($arrayproc, $array = array('id' => $id));
        };
        $arrayproc = array_merge($arrayproc, $array = array('fecha' => date("Y-m-d H:i:s")));
        return $arrayproc;
    }

    public static function validaciones($valid = [] ){
        $messageerror = null;
        $message = null;
        if(isset($valid['messageerror'])){
            $messageerror = $valid['messageerror'];
            return (['messageerror' => $messageerror]);
        }elseif(isset($valid['message'])){
            $message = ($valid['message']);
            return(['message' => $message]);
        };
    }
}

