@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/insertarusuario-c')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">INGRESO DE NUEVOS USUARIOS</h2>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Usuario</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="usuario" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">E-Mail</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="email" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Password</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="password" class="form-control">
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