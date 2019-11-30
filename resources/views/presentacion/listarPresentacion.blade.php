@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:40%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Presentacion</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $presentacion)
        <tr>
          <td>{{$presentacion->id_presentacion}}</td>
          <td >{{$presentacion->nombre_presentacion}}</td>
          <td style="width:40%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizarpresentacion/{$presentacion->id_presentacion}")}}' class="btn btn-success btn-sm" style="width:98%;">Actualizar</a>
            @if (count($listado)>1)
            <!--Boton Borrar-->
            <!-- <a href='{{url("/borrarpresentacion/{$presentacion->id_presentacion}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a> -->
            @endif
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>

<a href='{{url("/insertarpresentacion")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:35%;">Nueva Presentacion</a>
</div>
</body>
</html>