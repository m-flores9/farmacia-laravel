<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoMedicamento;

class ControladorTipoMedicamento extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //VISTA PRINCIPAL
    public function home(){
        $tipomedicamento=tipomedicamento::All();
        return view('tipo_medicamento/listarTipoMedicamento', ['listado'=>$tipomedicamento]);
    }
    //INSERTAR
    public function vista_insertar(){
        return view('tipo_medicamento/ingresarTipoMedicamento');
    }
    public function insertar(Request $request){
        $this->validate($request, [
            'nombre_tipo_medicamento' => 'required',
        ]);
          
        $tipomedicamento = new tipomedicamento;
        $tipomedicamento->nombre_tipo_med = $request->input('nombre_tipo_medicamento');
  
        $tipomedicamento->save();
        return redirect('/tipomedicamento')->with('info', 'Tipo de Medicamento agregado exitosamente!');
      }
    //ACTUALIZAR
    public function vista_actualizar($id){
        $tipomedicamento = TipoMedicamento::find($id);
        return view('tipo_medicamento/actualizarTipoMedicamento',['tipomedicamento'=>$tipomedicamento]);
      }
      public function actualizar(Request $request, $id){
        $this->validate($request,[
          'nombre_tipo_medicamento' => 'required',
        ]);
  
        $data =  array(
          'nombre_tipo_med' => $request->input('nombre_tipo_medicamento'),
        );
        tipomedicamento::where('id_tipo_medicamento',$id)->update($data);
        return redirect('/tipomedicamento')->with('info', 'Datos actualizados exitosamente!');
    }
    //BORRAR
    public function borrar($id){
        tipomedicamento::where('id_tipo_medicamento', $id)->delete();
        return redirect('/tipomedicamento')->with('info', 'Tipo de Medicamento eliminado exitosamente!');
    }
}
