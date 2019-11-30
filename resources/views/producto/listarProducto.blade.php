@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:95%; margin: auto;">
  <a href='{{url("/insertarproducto")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:15%;">Nuevo Producto</a>
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Cod Barras</th>
      <th scope="col">Producto</th>
      <th scope="col">Composicion</th>
      <th scope="col">Vencimiento</th>
      <th scope="col">Existencia</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Tipo</th>
      <th scope="col">Casa</th>
      <th scope="col">Presentacion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado as $producto)
        <tr>
          <td>{{$producto->id_producto}}</td>
          <td>{{$producto->barcode}}</td>
          <td>{{$producto->nombre_producto}}</td>
          <td>{{$producto->composicion}}</td>
          <td>{{$producto->fecha_vencimiento}}</td>
          <td>{{$producto->existencia}}</td>
          <td>{{$producto->precio_venta}}</td>
          <td>{{$producto->nombre_tipo_med}}</td>
          <td>{{$producto->nombre_casa_medica}}</td>
          <td>{{$producto->nombre_presentacion}}</td>
          <td style="width:15%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizarproducto/{$producto->id_producto}")}}' class="btn btn-success btn-sm" style="width:49%;">Actualizar</a>
            <!--Boton Borrar-->
            <a href='{{url("/borrarproducto/{$producto->id_producto}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a>
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>


</div>
</body>
</html>
