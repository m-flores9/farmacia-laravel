<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CasaMedica;

class ControladorCasaMedica extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //VISTA PRINCIPAL
    public function home(){
        $casa_medica=CasaMedica::All();
        return view('casa_medica/listarCasaMedica', ['listado'=>$casa_medica]);
    }
    //INSERTAR
    public function vista_insertar(){
        return view('casa_medica/ingresarCasaMedica');
    }
    public function insertar(Request $request){
        $this->validate($request, [
            'nombre_casa_medica' => 'required',
        ]);
          
        $casa_medica = new casamedica;
        $casa_medica->nombre_casa_medica = $request->input('nombre_casa_medica');
  
        $casa_medica->save();
        return redirect('/casamedica')->with('info', 'Casa medica agregada exitosamente!');
      }
      //ACTUALIZAR
    public function vista_actualizar($id){
        $casa_medica = CasaMedica::find($id);
        return view('casa_medica/actualizarCasaMedica',['casa_medica'=>$casa_medica]);
      }
      public function actualizar(Request $request, $id){
        $this->validate($request,[
          'nombre_casa_medica' => 'required',
        ]);
  
        $data =  array(
          'nombre_casa_medica' => $request->input('nombre_casa_medica'),
        );
        casamedica::where('id_casa_medica',$id)->update($data);
        return redirect('/casamedica')->with('info', 'Datos actualizados exitosamente!');
    }
      //BORRAR
        public function borrar($id){
            casamedica::where('id_casa_medica', $id)->delete();
        return redirect('/casamedica')->with('info', 'Casa Medica eliminada exitosamente!');
    }
}
