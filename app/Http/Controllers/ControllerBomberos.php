<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class ControllerBomberos extends Controller
{

    private $user;

    public function __construct(User $user){
        $this->user = $user;
        $this->middleware(['auth','usuarios', 'federacion', 'cuartel' ]);
    }
    public function indexBomberos(){
        $menu = 'a';
        $user = $this->user::getUsuarios();
        return view('/bomberos/index')->with(compact('menu','user'));
    }

    public function saveBomberos(Request $request){

        $rules = [
            'nombre' => 'required',
            'apellido'  => 'required',
            'username'  => 'required',
            'mail'  => 'required|email',
            'dni'  => 'required|numeric',
        ];

        $messages =[
            'nombre.required' => 'Debe ingresar un nombre',
            'apellido.required' => 'Debe ingresar un apellido',
            'username.required' => 'Debe ingresar un nombre de usuario',
            'mail.required' => 'Debe ingresar un mail',
            'mail.email' => 'Debe ingresar un mail correcto y valido',
            'dni.required' => 'Debe ingresar un D.N.I.',
            'dni.numeric' => 'El D.N.I. debe ser solo con números',
        ];

            $validate = Validator::make($request->all(),$rules,$messages);

            if ($validate->fails()) {
                $variables = [];
                $variables = array_merge($variables, ['messageinfo' => 'Debe completar todos los campos solicitados']);

                return redirect()->route('bomberos')->with($variables)->withErrors($validate)->withInput();
            }

        $datos = \Funciones::limpiarRequest($request->all());
        $user = $this->user::new_update($datos);
        $val = \Funciones::validaciones($user);
        return redirect()->route('bomberos')->with($val);
    }

    public function getBombero($id){
        if($id == null){
            return response()->json(['message' => 'No se detecta ningun ID'], 404);
        }else{
            $bombero = $this->user::getUser($id);

            return response()->json(['bombero' => $bombero], 200);
        }

    }
}
