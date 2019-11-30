@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Historial de Abonos</div>

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

                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No. Compra</th>
                          <th scope="col">Proveedor</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Monto</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($listado)>0)
                          @foreach ($listado as $producto)
                            <tr>
                              <td>{{$producto->id_compra}}</td>
                              <td>{{$producto->nombre_proveedor}}</td>
                              <td>{{$producto->fecha_abono}}</td>
                              <td>{{$producto->monto_abono}}</td>
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
