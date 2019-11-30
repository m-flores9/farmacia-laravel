@include ('plantillas/encabezado')
@include('plantillas/navbar')
<br>
<div style="width:95%; margin: auto;">
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Usuario</th>
      <th scope="col">E-Mail</th>
    </tr>
  </thead>
  <tbody>
    @if (count($listado)>0)
      @foreach ($listado->all() as $usuario)
        <tr>
          <td>{{$usuario->id}}</td>
          <td >{{$usuario->name}}</td>
          <td >{{$usuario->email}}</td>
          <td style="width:15%;">
            <!--Boton Actualizar-->
            <!-- <a href='{{url("/actualizarusuario/{$usuario->id}")}}' class="btn btn-success btn-sm" style="width:49%;">Actualizar</a> -->
            <!--Boton Borrar-->
            @if (count($listado)>1)
            <a href='{{url("/borrarusuario/{$usuario->id}")}}' class="btn btn-danger btn-sm" style="width:98%;">Eliminar</a>
            @endif
          </td>
        </tr>
      @endforeach
    @endif
  </tbody>
</table>
<a href='{{url("/insertarusuario")}}' class="btn btn-primary btn-sm" style="margin-bottom: 2%; width:15%;">Nuevo Usuario</a>
</div>
</body>
</html>