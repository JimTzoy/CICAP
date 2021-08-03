@extends('layouts.segundo')

@section('content')
<style type="text/css" media="screen">
  .ingreso{
    background: #32D95C;
  }
  .egreso{
    background: #F21628;
  }
  .capital{
    background:#0ba4cf;
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
                       
                    </div>
                    <div class="col-md-8">
                        <div >
                        <form class="form-horizontal" method="get" action="/consultar">
                            {{ csrf_field() }}
                              <div class="input-group mb-3">
                                <input id="id" name="id" type="hidden" value="{{$id}}">
                                <input id="fechainicio" type="date" class="form-control" name="fechainicio" value="{{ old('fechainicio') }}" required autofocus>
                                <input id="fechafin" type="date" class="form-control" name="fechafin" value="{{ old('fechafin') }}" required autofocus>
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
                    echo "<h4>";
                    echo $c->cantidad;
                    echo "</h4>";
                echo "</td>";
               ?>
                <td>
                <div class="btn-group btn-group-sm" role="group">
                <a href="" class="btn btn-primary">DETALLES</a>
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
                    <h4>$ {{$positivo}}</h4>
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
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection