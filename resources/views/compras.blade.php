@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Historial de Compras</div>

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
                  </br>

                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Proveedor</th>
                          <th scope="col">Total</th>
                          <th scope="col">Saldo</th>
                          <th scope="col">Abono</th>
                          <th scope="col">Registrar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($listado)>0)
                          @foreach ($listado as $producto)
                            <tr>
                            <form action="{{url('/abonar')}}" method="post">
                              {{csrf_field()}}
                              <th scope="row"><input type="hidden" class="form-control" name = "id" value="{{$producto->id_compra}}">{{$producto->id_compra}}</th>
                              <td>{{$producto->fecha_compra}}</td>
                              <td>{{$producto->nombre_proveedor}}</td>
                              <td>Q {{$producto->total_compra}}</td>
                              <td>Q {{$producto->saldo_compra}}</td>
                              <td><input type="text" class="form-control" name = "abono" placeholder="Abono" value="0"></td>
                              <td><button type="submit" class = "badge badge-primary">Abonar</button></td>
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
