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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-8">
                      LISTA DE ANTENAS DE LOS CLIENTES
                    </div>
                    <div class="col-md-4">
                      <input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
                       <p>{{$date->formatLocalized('%d')}} de {{$date->formatLocalized('%B')}} del {{$date->formatLocalized('%Y')}}</p>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                       <a href="{{route('antenas.create')}}" class="btn btn-primary">Crear Antena</a>

                    </div>
                    <div class="col-md-10">
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
                           
                  <div class="table-responsive" style="margin-top: 20px;">
               
                <?php
                
                    echo "<table class=\"table table-bordered\">";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=\"col\">ID</th>";
      echo "<th scope=\"col\">IP</th>";
      echo "<th scope=\"col\">NOMBRE</th>";
      echo "<th scope=\"col\">FRECUENCIA</th>";
      echo "<th scope=\"col\">CANAL</th>";
      echo "<th scope=\"col\">USER</th>";
      echo "<th scope=\"col\">PASSWORD</th>";
      echo "<th scope=\"col\">UBICACION</th>";
      echo "<th scope=\"col\">TIPO</th>";
      echo "<th scope=\"col\">MODELO</th>";
      echo "<th scope=\"col\">INTENSIDAD SEÑAL</th>";
      echo "<th scope=\"col\">UMBRAL MINIMO RUIDO</th>";
      echo "<th scope=\"col\">CCQ</th>";
      echo "<th scope=\"col\">TX</th>";
      echo "<th scope=\"col\">RX</th>";
      echo "<th scope=\"col\">AIRMAX</th>";
      echo "<th scope=\"col\">CAPACIDAD</th>";
      echo "<th scope=\"col\">CONECTADO A</th>";
      echo "<th scope=\"col\">FECHA CREADO</th>";
      echo "<th scope=\"col\">ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
  foreach ($antena as $a) {
                echo "<tr class=\"";
                echo $a->status;    
                echo "\"";
                 echo ">";
                echo "<td>";
                    echo $a->id;
                echo "</td>";
                echo "<td>";
                    echo $a->ip;
                echo "</td>";
                 echo "<td>";
                    echo $a->nombre;
                echo "</td>";
                echo "<td>";
                    echo $a->frecuencia;
                echo "</td>";
                echo "<td>";
                    echo $a->canal."  Mhz";
                echo "</td>";
                echo "<td>";
                    echo $a->user;
                echo "</td>";
                echo "<td>";
                    echo $a->pass;
                echo "</td>";
                echo "<td>";
                    echo $a->ubicacion;
                echo "</td>";
                echo "<td>";
                    echo $a->tipo;
                echo "</td>";
                echo "<td>";
                    echo $a->modelo;
                echo "</td>";
                echo "<td>";
                    echo $a->intensidad." dBm";
                echo "</td>";
                 echo "<td>";
                    echo $a->umbralruido."  dBm";
                echo "</td>";
                 echo "<td>";
                    echo $a->ccq."  %";
                echo "</td>";
                 echo "<td>";
                    echo $a->tx."  Mbps";
                echo "</td>";
                 echo "<td>";
                    echo $a->rx."  Mbps";
                echo "</td>";
                 echo "<td>";
                    echo $a->calidad."  %";
                echo "</td>";
                 echo "<td>";
                    echo $a->capacidad."  %";
                echo "</td>";
                echo "<td>";
                    echo $a->conectadoa;
                echo "</td>";
                echo "<td>";
                    echo $a->created_at;
                echo "</td>";
                 ?>
                <td>
                <div class="btn-group" role="group">
                  <a href="{{action('AntenaController@show', $a->id)}}" class="btn btn-primary">Ver</a>
                <a href="{{action('AntenaController@edit', $a->id)}}" class="btn btn-info">EDITAR</a>
                <form action="{{action('PlanController@destroy', $a->id)}}" method="post">
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

@endsection