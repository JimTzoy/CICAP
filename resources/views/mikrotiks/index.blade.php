@extends('layouts.segundo')

@section('content')
<style type="text/css" media="screen">
  .true{
    background: #32D95C;
  }
  .faltapago{
    background: #F2CB05;
  }
  .SUSPENDIDO{
    background: #FF551B;
  }
  .false{
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
      echo "<th scope=col></th>";
      echo "<th scope=col>#</th>";
      echo "<th scope=col>MAC</th>";
      echo "<th scope=col>SERVIDOR</th>";
      echo "<th scope=col></th>";
      echo "<th scope=col>BANCO</th>";
      echo "<th scope=col>RECIBIO</th>";
      echo "<th scope=col>FECHA INICIO</th>";
      echo "<th scope=col>FECHA FIN</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($response as $key => $p) {
              echo "<tr class=\"dddd\">";
                echo "<td  class=\"";
                if($p['disabled'] == 'false'){
                   echo "true";
                }else{
                  echo "false";
                }               
              echo "\"";
             echo ">";
            echo "</td>";
                echo "<td>";
                echo $key+1;
                echo "</td>";
                echo "<td>";
                echo $p['mac-address'];
                echo "</td>";
                 echo "<td>";
                    //echo $p['server'];
                echo "</td>";
                echo "<td>";
                    echo $p['type'];
                echo "</td>";
                echo "<td>";
                    echo $p['bypassed'];
                echo "</td>";
                echo "<td>";
                    echo $p['disabled'];
                echo "</td>";
                echo "<td>";
                    echo $p['comment'];
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('ContratosController@formato', $p['.id'])}}" class="btn btn-primary">DESACTIVAR</a>
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