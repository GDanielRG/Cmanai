@extends('layouts.app')
@section('content')
    
    <div class="jumbotron container">
    <form method="POST" action="">
        {{ csrf_field() }}
        <h3 class="mb-3">Alta de Productos</h3>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="exampleInputProducto"><strong>Nombre</strong></label>
                <input type="text" class="form-control" id="exampleInputProducto" placeholder="Nombre" name="name">
            </div>
            <div class="col-sm-6 mb-3">
                <label for="exampleInputCodigo"><strong>Codigo de Barras</strong></label>
                <input type="number" class="form-control" id="exampleInputCodigo" placeholder="Codigo de Barras" name="bar_code">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-3">
                <label for="exampleInputCantidad"><strong>Cantidad</strong></label>
                <input type="number" class="form-control" id="exampleInputCantidad" placeholder="Cantidad" name="quantity">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <br>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Producto <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div>
        </div>
    </form>
    </div>
@endsection