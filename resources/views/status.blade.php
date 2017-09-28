@extends('layouts.app')
@section('content')

@foreach($robots as $robot)
<div class="container">
<div class="row">
<div class="col-lg-4">
  <div class="jumbotron">
    <h4>Robot {{$robot->id}} - {{$robot->name}}</h4>
    <label for="exampleInputR1"><strong>Progreso de Tarea</strong></label>
    <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="exampleInputR1">25%</div>
</div>
<br>
<label for="exampleInputIns1"><strong>Instrucciones</strong></label>
<ul class="list-group " id="exampleInputIns1">
  <li class="list-group-item disabled">Intruccion 1</li>
  <li class="list-group-item active">Intruccion 2</li>
  <li class="list-group-item">Intruccion 3</li>
  <li class="list-group-item">Intruccion 4</li>
  <li class="list-group-item">Intruccion 5</li>
</ul>
<br>
<div>
  <label for="Posicion1"><strong>Posicion</strong></label>
  <p id="Posicion1"> ({{$robot->posX}} , {{$robot->posY}})</p>

</div>
  </div>
</div>
@endforeach

@endsection
