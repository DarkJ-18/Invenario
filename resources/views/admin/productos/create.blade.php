@extends('adminlte::page')

@section('title','Agregar producto')

@section('breadcrumb')
<li class="breadcrumb-item active">
    <a href="{{route('productos.index')}}">Producto</a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Registro de productos</h3>
    </div>

    {!! Form::open(['route'=>'productos.store', 'method'=>'POST','files' => true]) !!}
    @include('admin.productos.form.form')
</div>

<!-- /.card-body -->
<div class="card-footer">
    <a class="btn btn-danger float-right" href="{{route('productos.index')}}">Cancelar</a>
    <input type="submit" value="Guardar" class="btn btn-primary">
</div>
{!! Form::close() !!}
</div>
@endsection