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
    @if($robot->orders->count())<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{$robot->orders()->where('completed', true)->get()->count() / $robot->orders->count() *100}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" id="exampleInputR1">{{$robot->orders()->where('completed', true)->get()->count()}}/{{$robot->orders->count()}}</div>@endif
</div>
<br>
<label for="exampleInputIns1"><strong>Instrucciones</strong></label>
<ul class="list-group " id="exampleInputIns1">
  @foreach($robot->orders as $order)
  <li class="list-group-item">{{$order->type}}</li>
  @endforeach
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
