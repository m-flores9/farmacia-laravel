@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:40%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tipo de Medicamento</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $tipomedicamento)
        <tr>
          <td>{{$tipomedicamento->id_tipo_medicamento}}</td>
          <td >{{$tipomedicamento->nombre_tipo_med}}</td>
          <td style="width:40%;">
            <!--Boton Actualizar-->
            <a href='{{url("/actualizartipomedicamento/{$tipomedicamento->id_tipo_medicamento}")}}' class="btn btn-success btn-sm" style="width:98%;">Actualizar</a>
            @if (count($listado)>1)
            <!--Boton Borrar-->
            <!-- <a href='{{url("/borrartipomedicamento/{$tipomedicamento->id_tipo_medicamento}")}}' class="btn btn-danger btn-sm" style="width:49%;">Eliminar</a> -->
            @endif
          </td>
        </tr>
      @endforeach
    @endif

  </tbody>
</table>

<a href='{{url("/insertartipomedicamento")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:35%;">Nueva Tipo de Medicamento</a>
</div>
</body>
</html>