<?php

namespace App\Http\Middleware;

use Closure;
use App\Cuarteles;

class MiddlewareCuartel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = \Auth::user();
        $cuartel =Cuarteles::find($user->cuartel);
        if($user->rol == 1){
            return $next($request);
        }elseif(!empty($cuartel)){
            if($user->cuartel != 0 && $cuartel->cuarfed == $user->federacion){
                return $next($request);
            }elseif($user->cuartel == 0){
                abort(403, "Usted no tiene asignado un cuartel de esta federación. Contacte con el administrador o regrese.");
            }elseif( $user->federacion == 0){
                abort(403, "Usted no tiene asignada una federación. Contacte con el administrador o regrese.");
            }
        }else{
            abort(403, "El cuartel no existe en la base de datos. Contacte con el administrador o regrese.");
        }
    }
}
