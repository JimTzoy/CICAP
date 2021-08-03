@extends('layouts.layout')

@section('content')
<style type="text/css" media="screen">
  .ACTIVO{
    background: #32D95C;
  }
  .faltapago{
    background: #F2CB05;
  }
  .SUSPENDIDO{
    background: #FF551B;
  }
  .CANCELADO{
    background: #F21628;
  }
  .REGALO{
    background: #21D7FF;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
      <input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      LISTA DE CONTRATOS
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-2 ACTIVO">
                           <p>ACTIVO</p>
                        </div>
                        <div class="col-md-3 SUSPENDIDO">
                           <p>SUSPENDIDO</p>
                        </div>
                        <div class="col-md-2 CANCELADO">
                           <p>CANCELADO</p>
                        </div>
                         <div class="col-md-3 faltapago">
                           <p>FALTA PAGO</p>
                        </div>
                        <div class="col-md-2 REGALO">
                           <p>REGALO</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                           
                  <div class="table-responsive" style="margin-top: 20px;">
                           
                <?php
                
                    echo "<table class=\"table table-bordered\">";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\">ID</th>";
      echo "<th scope=\"col\">NUMERO CLIENTE</th>";
      echo "<th scope=\"col\">NOMBRE</th>";
      echo "<th scope=\"col\">IPCLIENTE</th>";
      echo "<th scope=\"col\">IPANTENA</th>";
      echo "<th scope=\"col\">PLAN</th>";
      echo "<th scope=\"col\">TECNICO</th>";
      echo "<th scope=\"col\">ESTATUS</th>";
      echo "<th scope=\"col\">ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($buscar as $c) {
                echo "<tr class=\"";
                    if($c->fechafin >= $date){
                       echo $c->status;
                    }else{
                      echo "faltapago";
                    }
                    
                  echo "\"";
                 echo ">";
                echo "<td>";
                    echo $c->id;
                echo "</td>";
                echo "<td>";
                    echo $c->numerocliente;
                echo "</td>";
                echo "<td>";
                    echo $c->nombrecompleto;
                echo "</td>";
                echo "<td>";
                    echo $c->ipcliente;
                echo "</td>";
                echo "<td>";
                    echo $c->ipantena;
                echo "</td>";
                echo "<td>";
                    echo $c->plan_id;
                echo "</td>";
                echo "<td>";
                    echo $c->tecnico_id;
                echo "</td>";
                echo "<td>";
                    echo $c->status;
                echo "</td>";

             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('ContratosController@show', $c->id)}}" class="btn btn-primary">VER</a>
                <a href="{{route('index', $c->id)}}" class="btn btn-info">PAGAR</a>
                <a href="{{route('suspender', $c->id)}}" class="btn btn-danger">SUSPENDER</a>
                
                </div>
                <div class="btn-group" role="group">
                <a href="{{route('cancelar', $c->id)}}"class="btn btn-danger">CANCELAR</a>
                <a href="{{route('regalo', $c->id)}}" class="btn btn-dark">REGALO</a>
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
@endsection