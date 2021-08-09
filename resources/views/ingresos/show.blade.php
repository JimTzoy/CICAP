@extends('layouts.vista')

@section('content')

<div class="container">
<a href="{{route('ingresos.index')}}" title="" class="btn btn-danger">Regresar</a>
  <div class="card">
    <div class="card-header">
        @if ($ingreso->tipo == 'Ingreso')
          <h1>DETALLES DEL INGRESO</h1>
        @else
          <h1>DETALLES DEL EGRESO</h1>
        @endif
    </div>
    <div class="card-body">
    <div class="row">
      <div class="col-md-4">
        <img src="
        <?php 
          $t = $ingreso->tipo;
          if ( $t == "Ingreso") {
            echo "../img/i/$ingreso->img";
          }else{
            echo "../img/e/$ingreso->img";
          }
        ?>
        " width="100%">
      </div>
      <div class="col-md-8">
      <?php foreach ($ingresos as $c) {?>
          <div class="row">
            <div class="col-md-4" style="background: #496773;">
              <h3> $ <?php echo $c->cantidad; ?></h3>
            </div>
            <div class="col-md-4"  style="background: #6D96A6;">
              <h3><?php echo $c->fecha; ?></h3>
            </div>
            <div class="col-md-4" style="background: #496773;">
              <h3><?php echo $c->nbanco; ?></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8" style="background: #929AA6;">
              <h3><?php echo $c->descripcion; ?></h3>
            </div>
            <div class="col-md-4"  style="background: #6D96A6;">
              <h3><?php echo $c->name; ?></h3>
            </div>
          </div>
          <?php } ?>
      </div>
    </div>
    </div>

  </div>
</div>
@endsection
