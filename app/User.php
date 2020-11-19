<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
/*     public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerificacionCorreo);
    } */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','nickname', 'dni','cuartel','lp','grado','federacion','rol','inactive'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function new_update($datos){
        $inactivar = null;
        if(isset($datos['inactivar'])){
            $inactivar= 1;
        }else{
            $inactivar= 0;
        }

        if($datos['action'] == 'bomberoadmin'){
            try{
                $clave = ['dni' => $datos['dni']];

                $data = [
                    'name' => $datos['nombre'],
                    'email' => $datos['mail'],
                    'surname' => $datos['apellido'],
                    'nickname' => $datos['username'],
                    'dni' => $datos['dni'],
                    'cuartel' => $datos['cuartel'],
                    'lp' => $datos['lp'],
                    'grado' => $datos['grado'],
                    'federacion' => $datos['federacion'],
                    'rol' => $datos['rol'],
                    'inactive' => $inactivar,
                ];

                $user = User::updateOrCreate($clave ,$data);

                return (['message' => 'Exito al procesar el registro: ' .$user['name'] .' '. $user['surname'].'. LP: ' . $user['lp']]);

            }catch(\Exception $e){
                return (['messageerror' => 'Hay un error en la ejecución de la tarea' . $e->getMessage()]);
            }
        }else{
            return (['messageerror' => 'Solo los administradores pueden modificar datos referentes al bombero']);
        }
    }

    public static function getUsuarios(){
        $user = \Auth::user()->rol;
        $cuartel =  \Auth::user()->cuartel;
        if($user == 1){
            $bomberos = User::all();
            return $bomberos;
        }elseif($user == 2){
            $bomberos = User::where('cuartel', '=' , $cuartel)->get();
            return $bomberos;
        }
    }

    public static function getUser($id){
        try{
            $bombero = User::where('dni','=',$id)->first();
            //$bombero = json_encode($bombero);
            return $bombero;
        }catch(\Exception $e){
            return (['messageerror' => 'Error en encontrar el bombero']);
        }
    }

    public function cuarteles(){
        return $this->hasMany('App\Cuarteles','cuarid',  'cuartel');
    }

    public function federaciones(){
        return $this->hasMany('App\Federaciones','fedcod',  'federacion');
    }
}
