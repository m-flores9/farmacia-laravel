@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/actualizarproveedor-c',$proveedor->id_proveedor)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">ACTUALIZAR PROVEEDOR</h2>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Nombre de Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="nombre_proveedor" class="form-control" value="{{$proveedor->nombre_proveedor}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Direccion de Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="direccion_proveedor" class="form-control" value="{{$proveedor->direccion_proveedor}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Telefono de Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="telefono_proveedor" class="form-control" value="{{$proveedor->telefono_proveedor}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Correo de Proveedor</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="correo_proveedor" class="form-control" value="{{$proveedor->correo_proveedor}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">No. de Cuenta Bancaria</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="cuentas_bancarias" class="form-control" value="{{$proveedor->cuentas_bancarias}}">
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