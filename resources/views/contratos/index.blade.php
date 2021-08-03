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
                  <div class="row">
                    <div class="col-md-2">
                       <a href="{{route('contratos.create')}}" class="btn btn-primary">Crear Contrato</a>
                    </div>
                    <div class="col-md-10">
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
  foreach ($contrato as $key => $c) {
                echo "<tr class=\"dddd\">";
                echo "<td  class=\"";
                    if($c->fechafin >= $date){
                       echo $c->status;
                    }else{
                      echo "faltapago";
                    }               
                  echo "\"";
                 echo ">";
                echo "</td>";
                echo "<td>";
                    echo $key+1;
                echo "</td>";
                echo "<td>";
                    echo $c->numerocliente;
                echo "</td>";
                echo "<td>";
                    echo $c->nombrecompleto;
                echo "</td>";
                echo "<td>";
                    echo "<a href=\"$c->ipcliente";
                    echo ":3141";
                    echo "\">".$c->ipcliente;
                    echo "</a>";
                echo "</td>";
                echo "<td>";
                    echo "<a href=\"$c->ipantena";
                    echo "\">".$c->ipantena;
                    echo "</a>";
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
                 {{ $contrato->withQueryString()->links() }}
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection