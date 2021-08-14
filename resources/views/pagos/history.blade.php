@extends('layouts.segundo')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">HISTORIAL DE PAGOS  </div>
                   
                <div class="table-responsive">
                  <br> 
                <?php
                  echo "<table class='table table-bordered'>";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>#</th>";
      echo "<th scope=col>FECHA PAGO</th>";
      echo "<th scope=col>NOMBRE</th>";
      echo "<th scope=col>CANTIDAD</th>";
      echo "<th scope=col>BANCO</th>";
      echo "<th scope=col>RECIBIO</th>";
      echo "<th scope=col>FECHA INICIO</th>";
      echo "<th scope=col>FECHA FIN</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($pagos as $key => $p) {
                echo "<tr>";
                echo "<td>";
                    echo $key+1;
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechapago));
                echo "</td>";
                echo "<td>";
                   echo "<p>".$p->nombrecompleto;
               echo "</td>";
                 echo "<td>";
                    echo "<p>".$p->cantidad." Pesos</p>";
                echo "</td>";
                echo "<td>";
                    echo $p->nbanco;
                echo "</td>";
                echo "<td>";
                    echo $p->name;
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechainicio));
                echo "</td>";
                echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechafin));
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('ContratosController@formato', $p->id)}}" class="btn btn-primary">RECIBO</a>
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

@endsection