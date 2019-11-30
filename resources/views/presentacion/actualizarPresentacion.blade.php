@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/actualizarpresentacion-c',$presentacion->id_presentacion)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">ACTUALIZAR PRESENTACION</h2>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Nombre de presentacion</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="nombre_presentacion" class="form-control" value="{{$presentacion->nombre_presentacion}}">
                  </div>
              </div>
    <br>
              <div class="float-right">
                <input type="submit" class="btn btn-success" name="actualizar" value="Actualizar">
            </div>
          </form>
          <br>
    </div>
    <br>
    <br>
    <!--==================================================-->
</body>
</html>