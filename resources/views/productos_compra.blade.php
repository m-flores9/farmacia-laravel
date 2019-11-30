@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Registrar Compra de Medicamentos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                    @if (session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif
                    <label>Presione "Siguiente" para registrar la compra o "Cancelar" para borrarla</label></br>
                      <a href="/borrar_compra" class="btn btn-danger">Cancelar</a>
                      <a href="/checkout_compra" class="btn btn-primary">Siguiente</a>

                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Producto</th>
                          <th scope="col">Presentación</th>
                          <th scope="col">Composición</th>
                          <th scope="col">Casa</th>
                          <th scope="col">Existencia</th>
                          <th scope="col">Cantidad</th>
                          <th scope="col">Comprar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($listado)>0)
                          @foreach ($listado as $producto)
                            <tr>
                            <form action="{{url('/comprar')}}" method="post">
                              {{csrf_field()}}
                              <th scope="row"><input type="hidden" class="form-control" name = "id" value="{{$producto->id_producto}}">{{$producto->id_producto}}</th>
                              <td>{{$producto->producto}}</td>
                              <td>{{$producto->presentacion}}</td>
                              <td>{{$producto->composicion}}</td>
                              <td>{{$producto->casa}}</td>
                              <td>{{$producto->existencia}}</td>
                              <td><input type="number" class="form-control" name = "cant" placeholder="Cantidad" value="1"></td>
                              <td><button type="submit" class = "badge badge-primary">Añadir</button></td>
                            </form>
                            </tr>
                          @endforeach
                        @endif

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
