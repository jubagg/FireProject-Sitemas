<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewareUsuarios
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
        if($user->inactive == 0) {
            return $next($request);
        }elseif($user->rol == 1){
            return $next($request);
        }else{
            abort(403, "Esta cuenta aun no ha sido activada. Contacte con el administrador o regrese.");
        }
    }
}
