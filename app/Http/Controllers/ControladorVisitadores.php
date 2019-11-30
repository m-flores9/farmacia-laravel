<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitadorMedico;

class ControladorVisitadores extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //VISTA PRINCIPAL
    public function home(){
        $visitadores=VisitadorMedico::All();
        return view('visitador/listarVisitador', ['listado'=>$visitadores]);
    }
    //INSERTAR
    public function vista_insertar(){
        return view('visitador/ingresarvisitador');
      }
      public function insertar(Request $request){
          $this->validate($request, [
            'nombre_visitador' => 'required',
            'telefono_visitador' => 'required',
            'correo_visitador' => 'required',
            'proveedor' => 'required',
          ]);
          
          $visitador = new visitadormedico;
          $visitador->nombre_vistador = $request->input('nombre_visitador');
          $visitador->telefono_visitador = $request->input('telefono_visitador');
          $visitador->correo_visitador = $request->input('correo_visitador');
          $visitador->id_proveedor = $request->input('proveedor');
    
          $visitador->save();
          return redirect('/visitadores')->with('info', 'Agregado exitosamente!');
      }
      //ACTUALIZAR
      public function vista_actualizar($id){
          $visitador = VisitadorMedico::find($id);
          return view('visitador/actualizarVisitador',['visitador'=>$visitador]);
        }
      public function actualizar(Request $request, $id){
        $this->validate($request,[
            'nombre_visitador' => 'required',
            'telefono_visitador' => 'required',
            'correo_visitador' => 'required',
            'proveedor' => 'required',
        ]);
  
        $data =  array(
          'nombre_vistador' => $request->input('nombre_visitador'),
          'telefono_visitador' => $request->input('telefono_visitador'),
          'correo_visitador' => $request->input('correo_visitador'),
          'id_proveedor' => $request->input('proveedor'),
        );
        VisitadorMedico::where('id_visitador',$id)->update($data);
        return redirect('/visitadores')->with('info', 'Datos actualizados exitosamente!');
    }
    //BORRAR
    public function borrar($id){
        visitadormedico::where('id_visitador', $id)->delete();
        return redirect('/visitadores')->with('info', 'Eliminado exitosamente!');
    }
}
