@include('plantillas/encabezado')
@include('plantillas/navbar')
    <!--Form de Productos-->
    <div class="text-center" style="width: 40%; height: 100%; margin-left: 30%; margin-top: 2%; color: #212121;">
        <form action="{{url('/actualizarproducto-c',$producto->id_producto)}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="float-center" style="margin-bottom: 5%">
                  <h2 class="float-center">ACTUALIZAR PRODUCTOS</h2>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Codigo de barras</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="barcode" class="form-control" value="{{$producto->barcode}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Nombre de producto</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="nombre_producto" class="form-control" value="{{$producto->nombre_producto}}">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Composicion</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="composicion" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Fecha de vencimiento</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="fecha_vencimiento" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Unidades en Existencia</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="existencia" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Precio venta</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="precio_venta" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Precio costo</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="precio_costo" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Descripcion</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="descripcion" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Estado</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="estado" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Tipo de medicamento</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="id_tipo_medicamento" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Casa medica</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="id_casa_medica" value="" class="form-control">
                  </div>
              </div>
              <div class="row espacio">
                  <div class="col">
                      <h4 class="float-left">Presentacion</h4>
                  </div>
                  <div class="col">
                      <input type="text" name="id_presentacion" value="" class="form-control">
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