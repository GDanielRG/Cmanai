@extends('layouts.app')
@section('content')

  <div class="jumbotron container">
    <div class="row">
      <div class="col-md-5 mb-3">
        <h3>Producto</h3>
      </div>
      <div class="col-md-5 mb-3">
        <h3>Codigo de Barras</h3>
      </div>
    </div>
          <div class="row">
              <table class="table table-hover table-inverse">
          <thead>
            <tr>
                <th>#</th>
                <th>Producto</th>
                <th>Rack ID</th>
           </tr>
           </thead>
           <tbody>
             @foreach($items as $item)
                 <tr>
                     <td>{{$item->id}}</td>
                     <td>{{$item->$product->name}}</td>
                     <td><select class="custom-select">
                         <option selected>Seleccione un Rack...</option>
                            @foreach($racks as $rack)
                              <option @if($item->rack_id == $rack->id) selected @endif value="{{$rack->id}}"> {{$rack->id}} ({{$rack->posX}}, {{$rack->posY}})</option>
                            @endforeach
                         </select>
                      </td>
                 </tr>
             @endforeach
           </tbody>
          </table>
          </div>
          <div class="row">
          <div class="col-md-12 mb-3">
              <br>
              <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal">Guardar Cambios <i class="fa fa-floppy-o" aria-hidden="true"></i></button>
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
              <p>Confirma el proceso para actualizar los datos</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Confirmar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
@endsection
