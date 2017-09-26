@extends('layouts.app')
@section('content')
    
    <div class="jumbotron container">
        <h3 class="mb-3">Alta de Productos</h3>
        <div class="row">
            <div class="col-sm-6 mb-3">
                <label for="exampleInputProducto"><strong>Producto</strong></label>
                <input type="text" class="form-control" id="exampleInputProducto" placeholder="Produtco">
            </div>
            <div class="col-sm-6 mb-3">
                <label for="exampleInputCodigo"><strong>Codigo de Barras</strong></label>
                <input type="number" class="form-control" id="exampleInputCodigo" placeholder="Codigo de Barras">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 mb-3">
            <label for="exampleInputPrecio"><strong>Codigo de Barras</strong></label>
            <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="text" class="form-control" id="exampleInputPrecio">
                <span class="input-group-addon">.00</span>
            </div>
            </div>
            <div class="col-sm-4 mb-3">
                <label for="exampleInputCantidad"><strong>Cantidad</strong></label>
                <input type="number" class="form-control" id="exampleInputCantidad" placeholder="Cantidad">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <br>
                <button type="button" class="btn btn-primary btn-lg btn-block">Agregar Producto <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
@endsection