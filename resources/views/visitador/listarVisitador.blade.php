@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:95%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre de Visitador Medico</th>
      <th scope="col">Telefono de Visitador Medico</th>
      <th scope="col">Correo de Visitador Medico</th>
      <th scope="col">Proveedores</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $visitador)
        <tr>
          <td>{{$visitador->id_visitador}}</td>
          <td>{{$visitador->nombre_vistador}}</td>
          <td>{{$visitador->telefono_visitador}}</td>
          <td>{{$visitador->correo_visitador}}</td>
          <td>{{$visitador->proveedor->nombre_proveedor}}</td>
          <td style="width:15%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizarvisitador/{$visitador->id_visitador}")}}' class="btn btn-success btn-sm" style="width:49%;">Actualizar</a>
            <!--Boton Borrar-->
            <a href='{{url("/borrarvisitador/{$visitador->id_visitador}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a>
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>

<a href='{{url("/insertarvisitador")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:15%;">Nuevo Visitador Medico</a>
</div>
</body>
</html>