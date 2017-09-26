@extends('layouts.app')
@section('content')
    
   <div class="jumbotron container">
        <h3 class="mb-3">Inventarios</h3>
        <div class="row">
        <div class="col-xs-6 mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Producto/Codigo" aria-label="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Buscar <i class="fa fa-search" aria-hidden="true"></i></button>
                </span>
            </div>
            </div>
            </div>
            <div class="row">
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
@endsection


