@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/insertarvisitador-c')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">INGRESO DE VISITADORES MEDICOS</h2>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Nombre de Visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="nombre_visitador" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Telefono de visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="telefono_visitador" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Correo de Visitador</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="correo_visitador" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="proveedor" value="" class="form-control">
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