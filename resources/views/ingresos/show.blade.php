@extends('layouts.vista')

@section('content')

<div class="container">
<a href="{{route('ingresos.index')}}" title="" class="btn btn-danger">Regresar</a>
  <div class="card">
    <div class="card-header">
      <h1>DETALLES DEL 
      <?php 
          if ($ingreso->tipo = "Ingreso") {
            echo "INGRESO";
          }else{
            echo "EGRESO";
          }
        ?>
      </h1>
    </div>
    <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <img src="
        <?php 
          $t = $ingreso->tipo;
          if ( $t = "Ingreso") {
            echo "../img/i/$ingreso->img";
          }else{
            echo "../img/e/$ingreso->img";
          }
        ?>
        ">
      </div>
      <div class="col-md-8">
          <h1>{{$ingreso->cantidad}}</h1>
      </div>
    </div>
    </div>

  </div>
</div>
@endsection
