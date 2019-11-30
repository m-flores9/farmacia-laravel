<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class ControladorProveedores extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function proveedores(){
      $proveedores=Proveedor::All();
      $items= Cart::instance('compra')->content();
      if (!$items->isEmpty()) {
        return view('proveedores', ['listado'=>$proveedores]);
      }
      else {
        return redirect('buscar_compra')->withErrorMessage('No hay productos en esta compra');
      }
    }

    //VISTA PRINCIPAL
    public function home(){
        $proveedores=Proveedor::All();
        return view('proveedor/listarProveedor', ['listado'=>$proveedores]);
      }
    //INSERTAR
    public function vista_insertar(){
        return view('proveedor/ingresarProveedor');
      }
      public function insertar(Request $request){
          $this->validate($request, [
            'nombre_proveedor' => 'required',
            'direccion_proveedor' => 'required',
            'telefono_proveedor' => 'required',
            'correo_proveedor' => 'required',
            'cuentas_bancarias' => 'required',
          ]);
          
          $proveedor = new proveedor;
          $proveedor->nombre_proveedor = $request->input('nombre_proveedor');
          $proveedor->direccion_proveedor = $request->input('direccion_proveedor');
          $proveedor->telefono_proveedor = $request->input('telefono_proveedor');
          $proveedor->correo_proveedor = $request->input('correo_proveedor');
          $proveedor->cuentas_bancarias = $request->input('cuentas_bancarias');
    
          $proveedor->save();
          return redirect('/proveedores')->with('info', 'Agregado exitosamente!');
      }
    //ACTUALIZAR
    public function vista_actualizar($id){
        $proveedor = Proveedor::find($id);
        return view('proveedor/actualizarProveedor',['proveedor'=>$proveedor]);
      }
      public function actualizar(Request $request, $id){
        $this->validate($request,[
            'nombre_proveedor' => 'required',
            'direccion_proveedor' => 'required',
            'telefono_proveedor' => 'required',
            'correo_proveedor' => 'required',
            'cuentas_bancarias' => 'required',
        ]);
  
        $data =  array(
          'nombre_proveedor' => $request->input('nombre_proveedor'),
          'direccion_proveedor' => $request->input('direccion_proveedor'),
          'telefono_proveedor' => $request->input('telefono_proveedor'),
          'correo_proveedor' => $request->input('correo_proveedor'),
          'cuentas_bancarias' => $request->input('cuentas_bancarias'),
        );
        proveedor::where('id_proveedor',$id)->update($data);
        return redirect('/proveedores')->with('info', 'Datos actualizados exitosamente!');
    }
    //BORRAR
    public function borrar($id){
        proveedor::where('id_proveedor', $id)->delete();
        return redirect('/proveedores')->with('info', 'Eliminado exitosamente!');
    }
}
