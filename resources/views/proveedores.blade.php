@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Seleccionar Proveedor</div>

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
                          <th scope="col">#</th>
                          <th scope="col">Proveedor</th>
                          <th scope="col">Pago</th>
                          <th scope="col">Credito</th>
                          <th scope="col">Seleccionar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($listado)>0)
                          @foreach ($listado as $producto)
                            <tr>
                            <form action="{{url('/grabar_compra')}}" method="post">
                              {{csrf_field()}}
                              <th scope="row"><input type="hidden" class="form-control" name = "id" value="{{$producto->id_proveedor}}">{{$producto->id_proveedor}}</th>
                              <td>{{$producto->nombre_proveedor}}</td>
                              <td><input type="text" class="form-control" name = "pago" placeholder="Pago" value="0"></td>
                              <td><input type="text" class="form-control" name = "credito" placeholder="Credito" value="0"></td>
                              <td><button type="submit" class = "badge badge-primary">Seleccionar</button></td>
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
