@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:40%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Casa Medica</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $casa_medica)
        <tr>
          <td>{{$casa_medica->id_casa_medica}}</td>
          <td >{{$casa_medica->nombre_casa_medica}}</td>
          <td style="width:40%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizarcasamedica/{$casa_medica->id_casa_medica}")}}' class="btn btn-success btn-sm" style="width:98%;">Actualizar</a>
            @if (count($listado)>1)
            <!--Boton Borrar-->
            <!-- <a href='{{url("/borrarcasamedica/{$casa_medica->id_casa_medica}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a> -->
            @endif
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>

<a href='{{url("/insertarcasamedica")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:35%;">Nueva Casa Medica</a>
</div>
</body>
</html>