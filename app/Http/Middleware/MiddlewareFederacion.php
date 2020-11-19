<?php

namespace App\Http\Middleware;

use Closure;
use App\Federaciones;

class MiddlewareFederacion
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

        $fed = session(\Funciones::getKey());
        $user = \Auth::user();

        if($fed == $user->federacion){
            return $next($request);
        }elseif($user->rol == 1){
            return $next($request);
        }else{
            abort(403, "Usted no esta autorizado a entrar en este sitio. Contacte con el administrador o regrese.[COD:FED]");
        }
    }
}
