@extends('layouts.layout')

@section('content')
<style type="text/css" media="screen">
  .ingreso{
    background: #32D95C;
  }
  .egreso{
    background: #F21628;
  }
  .dddd:hover{
     -webkit-box-shadow: -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
-moz-box-shadow:    -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
box-shadow:         -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
  }
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
      <input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      TABLA DE INGRESOS Y EGRESOS
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                         <div class="col-md-6 ingreso">
                           <p>INGRESO</p>
                        </div>
                        <div class="col-md-6 egreso">
                           <p>EGRESO</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                       <a href="{{route('ingresos.create')}}" class="btn btn-primary">Registrar</a>
                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                          Consultar
                      </button>
                    </div>
                    <div class="col-md-8">
                        <div >
                          <form>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="busqueda" id="busqueda" required="">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </div>
                  </div>
                           
                  <div class="table-responsive" style="margin-top: 20px;">
                  
               
                <?php
                
                    echo "<table class=\"table table-bordered\">";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\"></th>";
      echo "<th scope=\"col\">#</th>";
      echo "<th scope=\"col\">FECHA</th>";
      echo "<th scope=\"col\">NOMBRE</th>";
      echo "<th scope=\"col\">DESCRIPCION</th>";
      echo "<th scope=\"col\">BANCO</th>";
      echo "<th scope=\"col\">CANTIDAD</th>";
      echo "<th scope=\"col\">ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($ingreso as $key => $c) {
                echo "<tr class=\"dddd\">";
                echo "<td  class=\"";
                    if($c->tipo == 'Ingreso'){
                       echo "ingreso";
                    }else{
                      echo "egreso";
                    }               
                  echo "\"";
                 echo ">";
                    if($c->tipo == 'Ingreso'){
                        echo "+";
                      }else{
                        echo "-";
                      }               
                echo "</td>";
                echo "<td>";
                    echo $key+1;
                echo "</td>";
                echo "<td>";
                    echo $c->fecha;
                echo "</td>";
                echo "<td>";
                    echo $c->name;
                echo "</td>";
                echo "<td>";
                    echo $c->descripcion;
                echo "</td>";
                echo "<td>";
                    echo $c->nbanco;
                echo "</td>";
                echo "<td>";
                echo "$";
                 echo number_format($c->cantidad, 2, '.', '');
                echo "</td>";
               ?>
                <td>
                <div class="btn-group btn-group-sm" role="group">
                <a href="{{action('IngresoController@show', $c->id)}}" class="btn btn-primary">DETALLES</a>
                <a href="{{route('suspender', $c->id)}}" class="btn btn-danger">ELIMINAR</a>
                </div>
                </td>
                </tr>

                <?php
                }
                ?>
                <?php
                echo "</tbody>";
                echo "</table>";       
                ?>
                 {{ $ingreso->withQueryString()->links() }}
                 </div>
              <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th colspan="2">AZTECA</th>
                      <th colspan="2">BBVA</th>
                      <th colspan="2">COPPEL</th>
                      <th colspan="2">TEHUIPANGO</th>
                      <th colspan="2">EFECTIVO</th>
                      <th colspan="2">CIBERCICAP</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <th>
                    $ <?php echo number_format($aztecaingreso, 2, '.', ''); ?>
                  </th>
                  <td>
                   $ <?php echo number_format($aztecaegreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($bbvaingreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($bbvaegreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($coppelingreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($coppelegreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($tehuipangoingreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($tehuipangoegreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($efectivoingreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($efectivoegreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($ciberingreso, 2, '.', ''); ?>
                  </td>
                  <td>
                  $ <?php echo number_format($ciberegreso, 2, '.', ''); ?>
                  </td>
                </tr>
                  </tbody>
                </table>
             
                
              </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="text-align: center;">BUSCAR ENTRE FECHAS</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            <form class="form-horizontal" method="get" action="/buscar">
            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('fechainicio') ? ' has-error' : '' }}">
                            <label for="fechainicio" class="col-md-12 control-label"> Fecha inicio</label>

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
                            <label for="fechafin" class="col-md-12 control-label">Fecha fin</label>

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
         <button type="submit" class="btn btn-primary">Buscar</button>
              </form>
      </div>
    </div>
  </div>
</div>
@endsection