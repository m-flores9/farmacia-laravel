@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/actualizarvisitador-c',$visitador->id_visitador)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">ACTUALIZAR VISITADOR MEDICO</h2>
                  <br>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Nombre de Visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="nombre_visitador" class="form-control" value="{{$visitador->nombre_vistador}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Telefono de Visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="telefono_visitador" class="form-control" value="{{$visitador->telefono_visitador}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Correo de Visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="correo_visitador" class="form-control" value="{{$visitador->correo_visitador}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="proveedor" class="form-control" value="{{$visitador->proveedor->id_proveedor}}">
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