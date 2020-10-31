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

                      LISTA DE ANTENAS DE LOS ENLACES
                </div>
               
                <div class="card-body">
 
                       <a href="{{route('enlaces.create')}}" class="btn btn-primary">Crear Antena</a> 
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
      echo "<th scope=\"col\">MODO</th>";
      echo "<th scope=\"col\">TIPO</th>";
      echo "<th scope=\"col\">MODELO</th>";
      echo "<th scope=\"col\">INTENSIDAD SEÑAL</th>";
      echo "<th scope=\"col\">TX</th>";
      echo "<th scope=\"col\">RX</th>";
      echo "<th scope=\"col\">Tx EIRP / Tx Conducted</th>";
      echo "<th scope=\"col\">DISTANCIA</th>";
      echo "<th scope=\"col\">CONECTADO A</th>";
      echo "<th scope=\"col\">PASSWORD AP</th>";
      echo "<th scope=\"col\">FECHA CREADO</th>";
      echo "<th scope=\"col\">ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";

  foreach ($enlace as $e) {
                echo "<tr>";
                echo "<td>";
                    echo $e->id;
                echo "</td>";
                echo "<td>";
                    echo $e->ip;
                echo "</td>";
                 echo "<td>";
                    echo $e->nombre;
                echo "</td>";
                echo "<td>";
                    echo $e->frecuencia;
                echo "</td>";
                echo "<td>";
                    echo $e->canal."  Mhz";
                echo "</td>";
                echo "<td>";
                    echo $e->user;
                echo "</td>";
                echo "<td>";
                    echo $e->pass;
                echo "</td>";
                echo "<td>";
                    echo $e->ubicacion;
                echo "</td>";
                echo "<td>";
                    echo $e->modo;
                echo "</td>";
                echo "<td>";
                    echo $e->tipo;
                echo "</td>";
                echo "<td>";
                    echo $e->modelo;
                echo "</td>";
                echo "<td>";
                    echo $e->intensidad." dBm";
                echo "</td>";
                 echo "<td>";
                    echo $e->tx."  Mbps";
                echo "</td>";
                 echo "<td>";
                    echo $e->rx."  Mbps";
                echo "</td>";
                 echo "<td>";
                    echo $e->eirp."  dBm";
                echo "</td>";
                 echo "<td>";
                    echo $e->distancia."  Km";
                echo "</td>";
                echo "<td>";
                    echo $e->conectadoa;
                echo "</td>";
                echo "<td>";
                    echo $e->password;
                echo "</td>";
                echo "<td>";
                    echo $e->created_at;
                echo "</td>";
                 ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('PlanController@edit', $e->id)}}" class="btn btn-primary">EDITAR</a>
                <form action="{{action('PlanController@destroy', $e->id)}}" method="post">
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