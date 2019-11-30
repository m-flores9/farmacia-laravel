<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControladorReportes extends Controller
{
  public function saldo_proveedores(){
    $compras=DB::select('SELECT `proveedor`.`nombre_proveedor`, SUM(`orden_compra`.`saldo_compra`) AS `saldo`
    FROM `orden_compra`
    INNER JOIN `proveedor` ON `orden_compra`.`id_proveedor` = `proveedor`.`id_proveedor` GROUP BY `proveedor`.`nombre_proveedor` HAVING saldo > 0');
    return view('acreedores', ['listado'=>$compras]);
  }

  public function historial_abonos(){
    $compras=DB::select('SELECT `orden_compra`.`id_compra`, `proveedor`.`nombre_proveedor`, `abono`.`fecha_abono`, `abono`.`monto_abono`
      FROM `orden_compra`
    INNER JOIN `proveedor` ON `orden_compra`.`id_proveedor` = `proveedor`.`id_proveedor`
    INNER JOIN `abono` ON `abono`.`id_compra` = `orden_compra`.`id_compra`');
    return view('historial_abonos', ['listado'=>$compras]);
  }

  public function ventas_fechas(Request $request){
    $ventas=DB::select('SELECT `factura`.`fecha_factura`, SUM(`factura`.`total_factura`) AS `saldo`
    FROM `factura` GROUP BY `factura`.`fecha_factura` HAVING `factura`.`fecha_factura` BETWEEN ? AND ?', [$request->input('inicio'), $request->input('fin')]);
    return view('ventas_fechas', ['listado'=>$ventas]);
  }

  public function compras_fechas(Request $request){
    $ventas=DB::select('SELECT `orden_compra`.`fecha_compra`, SUM(`orden_compra`.`total_compra`) AS `saldo`
    FROM `orden_compra` GROUP BY `orden_compra`.`fecha_compra` HAVING `orden_compra`.`fecha_compra` BETWEEN ? AND ?', [$request->input('inicio'), $request->input('fin')]);
    return view('compras_fechas', ['listado'=>$ventas]);
  }

  public function vencimientos(Request $request){
    $ventas=DB::select('SELECT `producto`.`nombre_producto`, `casa_medica`.`nombre_casa_medica`, `producto`.`existencia`, `producto`.`fecha_vencimiento`
      FROM `producto`
    INNER JOIN `casa_medica` ON `producto`.`id_casa_medica` = `casa_medica`.`id_casa_medica` WHERE `producto`.`fecha_vencimiento` BETWEEN ? AND ?',
    [$request->input('inicio'), $request->input('fin')]);
    return view('vencimientos', ['listado'=>$ventas]);
  }
}
