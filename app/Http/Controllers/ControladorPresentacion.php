<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentacion;

class ControladorPresentacion extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //VISTA PRINCIPAL
    public function home(){
        $presentacion=Presentacion::All();
        return view('presentacion/listarPresentacion', ['listado'=>$presentacion]);
    }
    //INSERTAR
    public function vista_insertar(){
        return view('presentacion/ingresarPresentacion');
    }
    public function insertar(Request $request){
        $this->validate($request, [
            'nombre_presentacion' => 'required',
        ]);
          
        $presentacion = new presentacion;
        $presentacion->nombre_presentacion = $request->input('nombre_presentacion');
  
        $presentacion->save();
        return redirect('/presentacion')->with('info', 'Presentacion agregada exitosamente!');
      }
      //ACTUALIZAR
    public function vista_actualizar($id){
        $presentacion = Presentacion::find($id);
        return view('presentacion/actualizarPresentacion',['presentacion'=>$presentacion]);
      }
      public function actualizar(Request $request, $id){
        $this->validate($request,[
          'nombre_presentacion' => 'required',
        ]);
  
        $data =  array(
          'nombre_presentacion' => $request->input('nombre_presentacion'),
        );
        presentacion::where('id_presentacion',$id)->update($data);
        return redirect('/presentacion')->with('info', 'Datos actualizados exitosamente!');
    }
      //BORRAR
    public function borrar($id){
        presentacion::where('id_presentacion', $id)->delete();
        return redirect('/presentacion')->with('info', 'Presentacion eliminada exitosamente!');
    }
}
