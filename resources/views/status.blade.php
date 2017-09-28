@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
<div class="col-lg-4">
  <div class="jumbotron">
    <h4>Robot 1</h4>
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

<div class="col-lg-4">
  <div class="alert alert-danger" role="alert">
  ¡Robot sin bateria!
</div>
  <div class="container jumbotron">
    <h4>Robot 2</h4>
    <label for="exampleInputR2"><strong>Progreso de Tarea</strong></label>
    <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="exampleInputR2">50%</div>
</div>
<br>
<label for="exampleInputIns1"><strong>Instrucciones</strong></label>
<ul class="list-group" id="exampleInputIns1">
  <li class="list-group-item disabled">Intruccion 1</li>
  <li class="list-group-item disabled">Intruccion 2</li>
  <li class="list-group-item list-group-item-danger">Intruccion 3</li>
  <li class="list-group-item">Intruccion 4</li>
  <li class="list-group-item">Intruccion 5</li>
</ul>
<br>
<div>
  <label for="Posicion1"><strong>Posicion</strong></label>
  <p id="Posicion1"> ({{$robot->posX}} , {{$robot->posY}}) </p>

</div>
  </div>
</div>
<div class="col-lg-4">
  <div class="container jumbotron">
    <h4>Robot 3</h4>
    <label for="exampleInputR3"><strong>Progreso de Tarea</strong></label>
    <div class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="exampleInputR3">75%</div>
</div>
<br>
<label for="exampleInputIns1"><strong>Instrucciones</strong></label>
<ul class="list-group" id="exampleInputIns1">
  <li class="list-group-item disabled">Intruccion 1</li>
  <li class="list-group-item disabled">Intruccion 2</li>
  <li class="list-group-item disabled">Intruccion 3</li>
  <li class="list-group-item active">Intruccion 4</li>
  <li class="list-group-item">Intruccion 5</li>
</ul>
<br>
<div>
  <label for="Posicion1"><strong>Posicion</strong></label>
  <p id="Posicion1"> ({{$robot->posX}} , {{$robot->posY}}) </p>

</div>
  </div>
</div>
</div>
</div>

@endsection
