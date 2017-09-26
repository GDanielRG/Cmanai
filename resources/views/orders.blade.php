@extends('layouts.app')
@section('content')
    
    <div class="jumbotron container">
        <h3 class="mb-3">Pedidos</h3>
        <div class="row">
            <div class="col-sm-7 mb-3">
                <label for="exampleInputProducto"><strong>Producto</strong></label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Producto/Codigo" id="exampleInputProducto">
                    <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Buscar <i class="fa fa-search" ></i></button>
                    </span>
                </div>
            </div>
            <div class="col-sm-4 mb-3">
                <label for="exampleInputPrecio"><strong>Cantidad</strong></label>
                <input type="number" class="form-control" id="exampleInputPrecio" placeholder="Cantidad"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mb-3">
                <br>
        <button type="button" class="btn btn-primary btn-lg btn-block">Agregar a Pedido <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-3">
                <table class="table table-hover table-inverse">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Codigo de Barras</th>
                <th>Cantidad</th>
                <th>Precio</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            </div>
        </div>
            <div class="mb-3">
                <br>
        <button type="button" class="btn btn-primary btn-lg btn-block">Realizar Pedido <i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
@endsection


