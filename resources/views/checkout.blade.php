@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    </br>
                    <a href="/buscar" class="btn btn-primary">Productos</a>
                    </br>
                    </br>
                    <table class="table table-striped">
                     	<thead>
                         	<tr>
                             	<th scope="col">Producto</th>
                             	<th scope="col">Cantidad</th>
                             	<th scope="col">Precio</th>
                             	<th scope="col">Subtotal</th>
                         	</tr>
                     	</thead>

                     	<tbody>

                     		<?php foreach(Cart::content() as $row) :?>

                         		<tr>
                             		<td>
                                 		<p><strong><?php echo $row->name; ?></strong></p>
                                 		<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                             		</td>
                             		<td><?php echo $row->qty; ?></td>
                             		<td>Q<?php echo $row->price; ?></td>
                             		<td>Q<?php echo $row->total; ?></td>
                         		</tr>

                  	   	<?php endforeach;?>

                     	</tbody>

                     	<tfoot>


                     		<tr>
                     			<td colspan="2">&nbsp;</td>
                     			<td>Total</td>
                     			<td>Q<?php echo Cart::total(); ?></td>
                     		</tr>
                     	</tfoot>
                  </table>
                  <a href="/grabar" class="btn btn-primary">Registrar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
