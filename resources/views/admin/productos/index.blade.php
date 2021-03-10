@extends('adminlte::page')
@section('title','Titulo')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sección de productos</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-tool" href="{{route('product.create')}}">
                <h3 class="card-title">Agregar Producto <i class="fas fa-plus"></i></h3>
            </a>
        </div>
    </div>
    <br>
    <div class="card-body table-responsive p-0" style="height: 200px;">
        <table class="table table-head-fixed" id="product"> 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $products)
                <tr>
                    <td scope="row">{{$products->id}}</td>
                    <td>{{$products->nombre_producto}}</td>
                    <td>{{$products->precio}}</td>
                    <td>{{$products->cantidad}}</td>
                   
                </tr>

                @endforeach
            </tbody>
        </table>
        {{$productos->render()}}
    </div>
</div>
@endsection
@section('js')
<script src='https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js'></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
<script>
	$(document).ready(function() {
		$('#product').DataTable({
			responsive: true,
			autowidth: false,
            processing: true,
            

			"language": {
				"lengthMenu": "Mostrar " +
						`<select class="custom-select custom-select-sm form-control form-control-sm">
							<option value= '10'>10</option>
							<option value= '25'>25</option>
							<option value= '50'>50</option>
							<option value= '100'>100</option>
							<option value= '-1'>All</option>
						</select>` +
					" registros por pagina",
				"zeroRecords": "No se encontro - sorry",
				"info": "Mostrando la pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(Filtrado de _MAX_ registros totales)",
				"search": "Buscar:",
				"paginate": {
					"next": "Siguiente",
					"previous": "Anterior",
				},

			}
		});
	});
</script>
@endsection