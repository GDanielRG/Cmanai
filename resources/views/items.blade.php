@extends('layouts.app')
@section('content')

<div class="jumbotron container">
  <div class="row">
    <div class="col-md-5 mb-3">
      <h3>{{$product->name}}</h3>
    </div>
    <div class="col-md-5 mb-3">
      <h3>{{$product->bar_code}}</h3>
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
        @foreach($product->items as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{optional($item->product)->name}}</td>
            <td><select class="custom-select item-rack" data-item-id="{{$item->id}}">
                <option  value="none"> None</option>
              @foreach($racks as $rack)
                <option  @if($item->rack_id == $rack->id) selected @endif value="{{$rack->id}}"> {{$rack->name}} ({{$rack->posX}}, {{$rack->posY}})</option>
              @endforeach
            </select></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@section('scripts')
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })
      $(".item-rack").on('change', function() {
          $.ajax({
              url: "/items/" + $(this).data('item-id') + "/change-rack",
              type: "post",
              data : { rack : $(this).val()}
          })
          .done(function(response)
          {
              alert('Succesfully changed');

          })
          .fail(function(response)
          {
              alert('Something went wrong!');
          });
      });
</script>
@endsection
