@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Reporte entre fechas de Vencimiento</div>

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
                    <label>Ingrese el rango de fechas a consultar</label></br>
                    <div class="col-md-4">
                      <form action="{{url('/vencimientos')}}" method="post">
                        {{csrf_field()}}</br>
                        <label>Ejemplo: {{date('Y-m-d')}} (hoy)</label></br>
                        <label>Fecha inicial</label>
                        <input type="text" class="form-control" name = "inicio" placeholder="Inicial" ></br>
                        <label>Fecha final</label>
                        <input type="text" class="form-control" name = "fin" placeholder="final" value="{{date('Y-m-d')}}"></br>
                        <button type="submit" class = "btn btn-primary">Consultar</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
