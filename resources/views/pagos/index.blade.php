@extends('layouts.segundo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">HISTORIAL DE PAGOS DE </div>
               
                <div class="card-body">
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Registrar Pago
                  </button>
                   
                <div class="table-responsive">
                  <br> 
                <?php
                  echo "<table class='table table-bordered'>";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>ID</th>";
      echo "<th scope=col>FECHA PAGO</th>";
      echo "<th scope=col>CANTIDAD</th>";
      echo "<th scope=col>OBSERVACIONES</th>";
      echo "<th scope=col>FECHA INICIO</th>";
      echo "<th scope=col>FECHA FIN</th>";
      echo "<th scope=col>FECHA CREADO</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($pagos as $p) {
                echo "<tr>";
                echo "<td>";
                    echo $p->id;
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechapago));
                echo "</td>";
                 echo "<td>";
                    echo "<p>".$p->cantidad." Pesos</p>";
                echo "</td>";
                echo "<td>";
                    echo $p->observacion;
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechainicio));
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechafin));
                echo "</td>";
                echo "<td>";
                    echo $p->created_at;
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('ContratosController@formato', $p->id)}}" class="btn btn-primary">VER RECIBO</a>
                <form action="{{action('PagosController@destroy', $p->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger" type="submit">ELIMINAR</button>
                </form>
                </div>
                </td>
                </tr>
                <?php
                }
                echo "</tbody>";
                echo "</table>";       
                ?>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="text-align: center;">REALIZAR PAGO</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 style="text-align: center;">
          FECHAS ANTERIORES 
          <?php 
          foreach ($contra as $contra) {
             echo date('d-m-Y', strtotime($contra->fechainicio));
             echo "   //   ";
            echo date('d-m-Y', strtotime($contra->fechafin));
           } ?>
        </h4>
        <div>
            <form class="form-horizontal" method="POST" action="{{ route('pagos.store') }}">
            {{ csrf_field() }}

              <input name="id" type="hidden" value="{{$ids}}">
           <div class="form-group{{ $errors->has('fechapago') ? ' has-error' : '' }}">
                            <label for="fechapago" class="col-md-12 control-label">Fecha pago</label>

                            <div class="col-md-12">
                                <input id="fechapago" type="date" class="form-control" name="fechapago" value="{{ old('fechapago') }}" required autofocus>

                                @if ($errors->has('fechapago'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechapago') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-12 control-label">Cantidad </label>

                            <div class="col-md-12">
                                <input id="cantidad" type="int" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>

                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
                            <label for="observacion" class="col-md-12 control-label">OBSERVACIONES</label>

                            <div class="col-md-12">
                                <input id="observacion" type="text" class="form-control" name="observacion" value="{{ old('observacion') }}" required autofocus>

                                @if ($errors->has('observacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observacion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fechainicio') ? ' has-error' : '' }}">
                            <label for="fechainicio" class="col-md-12 control-label">Nueva Fecha inicio</label>

                            <div class="col-md-12">
                                <input id="fechainicio" type="date" class="form-control" name="fechainicio" value="{{ old('fechainicio') }}" required autofocus>

                                @if ($errors->has('fechainicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechainicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('fechafin') ? ' has-error' : '' }}">
                            <label for="fechafin" class="col-md-12 control-label">Nueva Fecha fin</label>

                            <div class="col-md-12">
                                <input id="fechafin" type="date" class="form-control" name="fechafin" value="{{ old('fechafin') }}" required autofocus>

                                @if ($errors->has('fechafin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechafin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">Guardar pago</button>
      </div>
    </div>
  </div>
</div>
@endsection