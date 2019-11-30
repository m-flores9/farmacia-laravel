<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ControladorUsuarios extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //VISTA PRINCIPAL
    public function home(){
        $usuarios=User::All();
        return view('usuarios/listarUsuario', ['listado'=>$usuarios]);
    }
    //INSERTAR
    public function vista_insertar(){
        return view('/auth/register');
    }
    //BORRAR
    public function borrar($id){
        User::where('id', $id)->delete();
        return redirect('/usuarios')->with('info', 'Eliminado exitosamente!');
    }
}