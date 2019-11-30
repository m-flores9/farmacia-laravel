<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use Cart;

class ControladorProveedor extends Controller
{
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
}
