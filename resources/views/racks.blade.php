@extends('layouts.app')
@section('content')

<div class="jumbotron container">
<form action="" method="POST">
            {{ csrf_field() }}
  <h3 class="mb-3">Alta de Racks</h3>
 <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="name"><strong>Rack ID</strong></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Rack ID">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="rackID"><strong>Coordenada x</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="posX" placeholder="X" name="posX">
                    </div>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="rackID"><strong>Coordenada y</strong></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="posY" placeholder="Y" name="posY">
                    </div>
                </div>
            </div>
  <div class="row">
        <div class="col-md-4 mb-3">
            <br>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Agregar Rack <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
        </div>
    </div>
            </form>

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
                   <td>{{$rack->name}}</td>
                   <td>({{$rack->posX}} , {{$rack->posY}})</td>
                   <td><button type="button" class="btn btn-danger btn-lg btn-block" data-toggle="modal" data-target="#exampleModal2">Eliminar Rack <i class="fa fa-times-circle" aria-hidden="true"></i></button></td>
               </tr>
           @endforeach
         </tbody>
        </table>
        </div>

@endsection
