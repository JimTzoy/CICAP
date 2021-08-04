@extends('layouts.layout')

@section('content')
<style type="text/css" media="screen">
  .ingreso{
    background: #80ff80;
  }
  .egreso{
    background: #ff8080;
  }
  .dddd:hover{
     -webkit-box-shadow: -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
-moz-box-shadow:    -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
box-shadow:         -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
  }
  .BBVA{
background: #0080c0;
}
.AZTECA{
  background: #008040;
}
.BANCOPPEL{
  background: #ffe375;
}
.TEHUIPANGO{
  background: #fa5f56;
}
.EFECTIVO{
  background: #93cede;
}
.CIBERCICAP{
  background: #ff0080;
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
                 echo " scope=\"row\">";
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
                </div>
                </td>
                </tr>

                <?php
                }
                ?>
                 <tr>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <td class="ingreso">INGRESO</td>
                  <td>
                    <h4>$ <?php echo number_format($positivo, 2, '.', '');?></h4>
                  </td>
                  <th></th>
                </tr>
                <tr>
                <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <td class="egreso">EGRESO</td>
                  <td>
                   <h4> $ <?php echo number_format($negativo, 2, '.', '');?></h4>
                  </td>
                  <th></th>
                </tr>
                <tr>
                <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <td class="capital">CAPITAL</td>
                  <td>
                   <h4> $ <?php echo number_format($totalcapital, 2, '.', '');?></h4>
                  </td>
                  <th></th>
                </tr>
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
                      <th class="AZTECA" colspan="2">AZTECA $ <?php echo number_format($t1, 2, '.', ''); ?></th>
                      <th class="BBVA" colspan="2">BBVA $ <?php echo number_format($t2, 2, '.', ''); ?></th>
                      <th class="BANCOPPEL" colspan="2">COPPEL $ <?php echo number_format($t3, 2, '.', ''); ?></th>
                      <th class="TEHUIPANGO" colspan="2">TEHUIPANGO $ <?php echo number_format($t4, 2, '.', ''); ?></th>
                      <th class="EFECTIVO" colspan="2">EFECTIVO $ <?php echo number_format($t5, 2, '.', ''); ?></th>
                      <th class="CIBERCICAP" colspan="2">CIBERCICAP $ <?php echo number_format($t6, 2, '.', ''); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td class="ingreso">
                   $ <?php echo number_format($aztecaingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                   $ <?php echo number_format($aztecaegreso, 2, '.', ''); ?>
                  </td>
                  <td class="ingreso">
                  $ <?php echo number_format($bbvaingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                  $ <?php echo number_format($bbvaegreso, 2, '.', ''); ?>
                  </td>
                  <td class="ingreso">
                  $ <?php echo number_format($coppelingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                  $ <?php echo number_format($coppelegreso, 2, '.', ''); ?>
                  </td>
                  <td class="ingreso">
                  $ <?php echo number_format($tehuipangoingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                  $ <?php echo number_format($tehuipangoegreso, 2, '.', ''); ?>
                  </td>
                  <td class="ingreso">
                  $ <?php echo number_format($efectivoingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                  $ <?php echo number_format($efectivoegreso, 2, '.', ''); ?>
                  </td>
                  <td class="ingreso">
                  $ <?php echo number_format($ciberingreso, 2, '.', ''); ?>
                  </td>
                  <td class="egreso">
                  $ <?php echo number_format($ciberegreso, 2, '.', ''); ?>
                  </td>
                </tr>
                <tr>
                  <th>
                    <strong>Capital</strong>
                  </th>
                  <td>
                   $ <?php echo number_format($taz, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tbb, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tco, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tte, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tef, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tcib, 2, '.', ''); ?>
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