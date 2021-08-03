@extends('layouts.segundo')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="padding: 20px 20px 20px 20px;">
                <div class="card-header">HISTORIAL</div>
                <form>
                              <div class="input-group mb-3">
                                <input type="date" class="form-control" name="fechainicio" id="fechainicio" required="">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                </div>
                              </div>
                          </form>
                <div class="table-responsive">
                  <br> 
                <?php
                  echo "<table class='table table-bordered'>";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>ID</th>";
      echo "<th scope=col>CONTRATO</th>";
      echo "<th scope=col>CANTIDAD</th>";
      echo "<th scope=col>FECHA</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($pagos as $p) {
                echo "<tr>";
                echo "<td>";
                    echo $p->id;
                echo "</td>";
                echo "<td>";
                    echo $p->nombrecompleto;
                echo "</td>";
                 echo "<td>";
                    echo "<p>".$p->cantidad." Pesos</p>";
                echo "</td>";
                 echo "<td>";
                    echo date('d-m-Y', strtotime($p->fechapago));
                echo "</td>";
               ?>
              
                </tr>
                
                <?php
                } 
                echo "<tr>";
                  echo "<th colspan=\"2\">Total</th>";
                  echo "<td colspan=\"2\">".$total." Pesos </td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";  
                    
                ?>
                 {{ $pagos->withQueryString()->links() }}
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection