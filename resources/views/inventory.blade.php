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
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Codigo de Barras</th>
                            <th>Cantidad</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)    
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->bar_code}}</td>
                                <td>{{$product->items->count()}}</td>
                                <td><a href="/products/{{$product->id}}"> <button class="btn btn-secondary" type="button">Ver <i class="fa fa-search" aria-hidden="true"></i></button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection


