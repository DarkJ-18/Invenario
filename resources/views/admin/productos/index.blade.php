@extends('adminlte::page')

@section('title','Productos')
@section('plugins.Datatables', true)
@section('css')
<!-- DataTables -->

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Sección de productos</h3>
        <div class="card-tools">
            <a type="button" class="btn btn-tool" href="{{route('productos.create')}}">
                <h3 class="card-title">Agregar Producto <i class="fas fa-plus"></i></h3>
            </a>
        </div>
    </div>
    <br>
    <div class="card-body table-responsive p-0" style="height:400px">
        <table id="products" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th>nombre_producto</th>
                    <th>precio</th>
                    <th>cantidad</th>
                    <th>Fecha crado</th>
                    <th colspan="1">&nbsp;</th>
                    <th colspan="1">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $products)
                <tr>
                    <td scope="row">{{$products->id}}</td>
                    <td>{{$products->nombre_producto}}</td>
                    <td>{{$products->precio}}</td>
                    <td>{{$products->cantidad}}</td>
                    <td>{{$products->created_at}}</td>
                    <td width="10px">
                        <a class="btn btn-info" href="{{route('productos.edit', $products->id)}}">Editar</a>
                    </td>
                    <td width="10px">
                        {!! Form::open(['route'=>['productos.destroy', $products->id], 'method'=>'DELETE']) !!}
                        <button class="btn btn-danger">Eliminar</button>
                        {!! Form::close() !!}
                    </td>

                </tr>

                @endforeach
            </tbody>
        </table>
        {{$productos->render()}}
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#products').DataTable({
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