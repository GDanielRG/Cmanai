@extends('layouts.app')
@section('content')

<div class="jumbotron container">
  <h3 class="mb-3">Alta de Productos</h3>
  <div class="row">
    <div class="col-sm-6 mb-3">
      <label for="product"><strong>Rack Name</strong></label>
      <input type="text" class="form-control" id="product" placeholder="Name">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-4 mb-3">
    <label for="rackID"><strong>Coordenada x</strong></label>
      <div class="input-group">
      <input type="text" class="form-control" id="rackID" placeholder="X">
      </div>
    </div>
    <div class="col-sm-4 mb-3">
      <label for="quantity"><strong>Coordenada y</strong></label>
        <input type="number" class="form-control" id="quantity" placeholder="Y">
    </div>
  </div>
  <div class="row">
        <div class="col-md-4 mb-3">
            <br>
            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Agregar Rack <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        </div>
    </div>
    <div class="row">
            <table class="table table-hover table-inverse">
        <thead>
          <tr>
              <th>Rack ID</th>
              <th>Posicion</th>
         </tr>
         </thead>
         <tbody>
           @foreach($racks as $rack)
               <tr>
                   <td>{{$rack->id}}</td>
                   <td>({{$rack->posX}} , {{$rack->posY}})</td>
                   <td><button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal2">Eliminar Rack <i class="fa fa-times-circle" aria-hidden="true"></i></button></td>
               </tr>
           @endforeach
         </tbody>
        </table>
        </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmacion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Confirma el proceso para dar de alta el Rack</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmacion de Baja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Confirma el proceso para dar de baja el Rack</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
@endsection
