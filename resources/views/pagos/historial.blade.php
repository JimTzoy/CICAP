@extends('layouts.segundo')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3">
        
      </div>
        <div class="col-md-6">
            <div class="card" style="padding: 20px 20px 20px 20px;">
                <div class="card-header">HISTORIAL</div>
                  
                <div class="table-responsive">
                  <br> 
                <?php
                  echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr>";
                      echo "<th scope=col>RECIBIO</th>";
                      echo "<th scope=col>CANTIDAD</th>";
                      echo "<th scope=col>FECHA</th>";
                    echo "</tr>";
                  echo "</thead>";
                  echo "<tbody>";
            foreach ($pagos as $p) {
                echo "<tr>";
                echo "<td>";
                    echo $p->name;
                echo "</td>";
                 echo "<td>";
                    echo "<p>".$p->cantidad." Pesos</p>";
                echo "</td>";
                echo "<td>";
                    echo "<p>";
                    echo date('d-m-Y', strtotime($p->fechapago));
                    echo "</p>";
                echo "</td>";
               ?>
                </tr>
                <?php
                }
                echo "</tbody>";
                echo "</table>";       
                ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      
    </div>
  </div>
</div>

@endsection