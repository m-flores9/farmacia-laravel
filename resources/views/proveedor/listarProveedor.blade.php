@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:95%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de Proveedor</th>
      <th scope="col">Direccion de Proveedor</th>
      <th scope="col">Telefono de Proveedor</th>
      <th scope="col">Correo de Proveedor</th>
      <th scope="col">No. de Cuenta Bancaria</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $proveedor)
        <tr>
          <td>{{$proveedor->id_proveedor}}</td>
          <td>{{$proveedor->nombre_proveedor}}</td>
          <td>{{$proveedor->direccion_proveedor}}</td>
          <td>{{$proveedor->telefono_proveedor}}</td>
          <td>{{$proveedor->correo_proveedor}}</td>
          <td>{{$proveedor->cuentas_bancarias}}</td>
          <td style="width:15%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizarproveedor/{$proveedor->id_proveedor}")}}' class="btn btn-success btn-sm" style="width:98%;">Actualizar</a>
            <!--Boton Borrar-->
            <!-- <a href='{{url("/borrarproveedor/{$proveedor->id_proveedor}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a> -->
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>

<a href='{{url("/insertarproveedor")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:15%;">Nuevo Proveedor</a>
</div>
</body>
</html>