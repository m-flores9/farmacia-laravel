<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Factura;
use App\DetalleFactura;
use App\OrdenCompra;
use App\DetalleCompra;
use Illuminate\Support\Facades\DB;
use Cart;

class ControladorProducto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function prod(){
      $productos=DB::select('SELECT `producto`.`id_producto`,`producto`.`barcode`, `producto`.`nombre_producto` AS `producto`, `presentacion`.`nombre_presentacion` AS `presentacion`, `producto`.`composicion`, `casa_medica`.`nombre_casa_medica` AS `casa`, `producto`.`precio_venta` AS `precio`,
        `producto`.`existencia` AS `existencia`
        FROM `producto`
        INNER JOIN `casa_medica` ON `producto`.`id_casa_medica` = `casa_medica`.`id_casa_medica`
        INNER JOIN `presentacion` ON `producto`.`id_presentacion` = `presentacion`.`id_presentacion`');
      return view('productos', ['listado'=>$productos]);
    }

    public function prod_compra(){
      $productos=DB::select('SELECT `producto`.`id_producto`,`producto`.`barcode`, `producto`.`nombre_producto` AS `producto`, `presentacion`.`nombre_presentacion` AS `presentacion`, `producto`.`composicion`, `casa_medica`.`nombre_casa_medica` AS `casa`, `producto`.`existencia` AS `existencia`
        FROM `producto`
        INNER JOIN `casa_medica` ON `producto`.`id_casa_medica` = `casa_medica`.`id_casa_medica`
        INNER JOIN `presentacion` ON `producto`.`id_presentacion` = `presentacion`.`id_presentacion`');
      return view('productos_compra', ['listado'=>$productos]);
    }

    public function borrar(){
      Cart::destroy();

      return redirect('buscar')->withSuccessMessage('Se borró correctamente esta venta');
    }
    public function borrar_compra(){
      Cart::instance('compra')->destroy();

      return redirect('buscar_compra')->withSuccessMessage('Se borró correctamente esta compra');
    }

    public function carrito(Request $request)
    {
        $this->validate($request, [
          'id' => 'required',
          'cant' => 'required'
        ]);

        $id = $request->input('id');
        $producto = Producto::find($id);
        if ($producto->existencia > $request->input('cant')) {
          Cart::add($id, $producto->nombre_producto, $request->input('cant'), $producto->precio_venta)->associate(Product::class);
          return redirect('buscar')->withSuccessMessage('Se agrego el producto a esta venta');
        }
        else {
          return redirect('buscar')->withErrorMessage('La existencia no es suficiente');
        }

    }

    public function carrito_compra(Request $request)
    {
        $this->validate($request, [
          'id' => 'required',
          'cant' => 'required'
        ]);

        $id = $request->input('id');
        $producto = Producto::find($id);

        Cart::instance('compra')->add($id, $producto->nombre_producto, $request->input('cant'), $producto->precio_venta);
        return redirect('buscar_compra')->withSuccessMessage('Se agrego el producto a esta compra');

    }

    public function grabar(){

      $factura = new Factura;
      $factura->id_cliente = 1;
      $factura->fecha_factura = date('Y-m-d');
      $factura->total_factura = Cart::total();
      $factura->save();
      $f_id = $factura->id_factura;

      foreach(Cart::content() as $row) {
        $detalle = new DetalleFactura;
        $detalle->cantidad = $row->qty;
        $detalle->subtotal = $row->total;
        $detalle->id_factura = $f_id;
        $detalle->id_producto = $row->id;
        $detalle->save();

        $producto = Producto::find($row->id);
        $new_e = $producto->existencia - $row->qty;
        $data = array(
          'existencia' => $new_e
        );
        Producto::where('id_producto', $row->id)->update($data);
      }
      Cart::destroy();
      return redirect('buscar')->withSuccessMessage('Se registró correctamente esta venta');
    }

    public function grabar_compra(Request $request){
      $pago=$request->input('pago');
      $credito=$request->input('credito');
      $subtotal=$pago+$credito;
      $total=Cart::instance('compra')->total();
      if ($subtotal==$total) {
        $factura = new OrdenCompra;
        $factura->id_proveedor = $request->input('id');
        $factura->fecha_compra = date('Y-m-d');
        $factura->total_compra = Cart::instance('compra')->total();
        $factura->pago_efectivo = $request->input('pago');
        $factura->pago_credito = $request->input('credito');
        $factura->saldo_compra = $total - $pago;
        $factura->save();
        $f_id = $factura->id_compra;

        foreach(Cart::content() as $row) {
          $detalle = new DetalleCompra;
          $detalle->cantidad = $row->qty;
          $detalle->subtotal_compra = $row->total;
          $detalle->id_compra = $f_id;
          $detalle->id_producto = $row->id;
          if ($pago<$total) {
            $detalle->estado_compra = 1;
          }
          else {
            $detalle->estado_compra = 0;
          }
          $detalle->save();

          $producto = Producto::find($row->id);
          $new_e = $producto->existencia + $row->qty;
          $data = array(
            'existencia' => $new_e
          );
          Producto::where('id_producto', $row->id)->update($data);
        }
        Cart::instance('compra')->destroy();
        return redirect('buscar_compra')->withSuccessMessage('Se registró correctamente esta compra');
      }
      else {
        return redirect('proveedor')->withErrorMessage('Pago incorrecto');
      }

    }

    //VISTA PRINCIPAL
    public function home(){


      $productos=DB::select('SELECT `producto`.`id_producto`, `producto`.`barcode`, `producto`.`nombre_producto`, `producto`.`composicion`, `producto`.`fecha_vencimiento`, `producto`.`existencia`, `producto`.`precio_venta`, `producto`.`precio_costo`, `producto`.`descripcion`,
        `tipo_medicamento`.`nombre_tipo_med`, `casa_medica`.`nombre_casa_medica`, `presentacion`.`nombre_presentacion`
        FROM `producto`
	       INNER JOIN `tipo_medicamento` ON `producto`.`id_tipo_medicamento` = `tipo_medicamento`.`id_tipo_medicamento`
	        INNER JOIN `casa_medica` ON `producto`.`id_casa_medica` = `casa_medica`.`id_casa_medica`
	         INNER JOIN `presentacion` ON `producto`.`id_presentacion` = `presentacion`.`id_presentacion`');
      return view('producto/listarProducto', ['listado'=>$productos]);

    }
    //INSERTAR
    public function vista_insertar(){

      //return view('producto/ingresarProducto');

      $casas=DB::select('SELECT `casa_medica`.*
        FROM `casa_medica`');
        return view('producto/ingresarProducto', ['listado'=>$casas]);

    }

    public function insertar(Request $request){
        $this->validate($request, [
            'barcode' => 'required',
            'nombre_producto' => 'required',
            'composicion' => 'required',
            'fecha_vencimiento' => 'required',
            'existencia' => 'required',
            'precio_venta' => 'required',
            'precio_costo' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
            'id_tipo_medicamento' => 'required',
            'id_casa_medica' => 'required',
            'id_presentacion' => 'required',
        ]);

        $producto = new producto;
        $producto->barcode = $request->input('barcode');
        $producto->nombre_producto = $request->input('nombre_producto');
        $producto->composicion = $request->input('composicion');
        $producto->fecha_vencimiento = $request->input('fecha_vencimiento');
        $producto->existencia = $request->input('existencia');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_costo = $request->input('precio_costo');
        $producto->descripcion = $request->input('descripcion');
        $producto->estado = $request->input('estado');
        $producto->id_tipo_medicamento = $request->input('id_tipo_medicamento');
        $producto->id_casa_medica = $request->input('id_casa_medica');
        $producto->id_presentacion = $request->input('id_presentacion');

        $producto->save();
        return redirect('/productos')->with('info', 'Producto agregado exitosamente!');
    }
    //ACTUALIZAR
    public function vista_actualizar($id){
      $productos = Producto::find($id);
      return view('producto/actualizarProducto',['producto'=>$productos]);
    }
    public function actualizar(Request $request, $id){
      $this->validate($request,[
        'barcode' => 'required',
        'nombre_producto' => 'required',
        'composicion' => 'required',
        'fecha_vencimiento' => 'required',
        'existencia' => 'required',
        'precio_venta' => 'required',
        'precio_costo' => 'required',
        'descripcion' => 'required',
        'estado' => 'required',
        'id_tipo_medicamento' => 'required',
        'id_casa_medica' => 'required',
        'id_presentacion' => 'required',
      ]);

      $data =  array(
        'barcode' => $request->input('barcode'),
        'nombre_producto' => $request->input('nombre_producto'),
        'composicion' => $request->input('composicion'),
        'fecha_vencimiento' => $request->input('fecha_vencimiento'),
        'existencia' => $request->input('existencia'),
        'precio_venta' => $request->input('precio_venta'),
        'precio_costo' => $request->input('precio_costo'),
        'descripcion' => $request->input('descripcion'),
        'estado' => $request->input('estado'),
        'id_tipo_medicamento' => $request->input('id_tipo_medicamento'),
        'id_casa_medica' => $request->input('id_casa_medica'),
        'id_presentacion' => $request->input('id_presentacion'),
      );
      producto::where('id_producto',$id)->update($data);
      return redirect('/productos')->with('info', 'Datos actualizados exitosamente!');
  }

    //BORRAR
    public function borrar_producto($id){
      producto::where('id_producto', $id)->delete();
      return redirect('/productos')->with('info', 'Producto elimindo exitosamente!');
  }
}
