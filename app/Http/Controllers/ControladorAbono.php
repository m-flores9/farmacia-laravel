<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Abono;
use App\OrdenCompra;
class ControladorAbono extends Controller
{
  public function compras(){
    $compras=DB::select('SELECT `orden_compra`.`id_compra`, `orden_compra`.`fecha_compra`, `proveedor`.`nombre_proveedor`, `orden_compra`.`total_compra`, `orden_compra`.`saldo_compra`
      FROM `orden_compra`
    INNER JOIN `proveedor` ON `orden_compra`.`id_proveedor` = `proveedor`.`id_proveedor` WHERE `orden_compra`.`saldo_compra` > 0');
    return view('compras', ['listado'=>$compras]);
  }

  public function grabar_abono(Request $request){
    $abono=$request->input('abono');
    $id=$request->input('id');
    $compra = OrdenCompra::find($id);
    $total = $compra->saldo_compra;

    if ($abono<=$total && $abono!=0) {
      $factura = new Abono;
      $factura->id_compra = $id;
      $factura->fecha_abono = date('Y-m-d');
      $factura->monto_abono = $abono;
      $factura->save();
      $f_id = $factura->id_obono;

      $n_saldo = $compra->saldo_compra - $abono;

      $data = array(
        'saldo_compra' => $n_saldo
      );
      OrdenCompra::where('id_compra', $id)->update($data);

      return redirect('compras')->withSuccessMessage('Se registró correctamente el abono');
    }
    else {
      return redirect('compras')->withErrorMessage('Abono incorrecto');
    }

  }
}
