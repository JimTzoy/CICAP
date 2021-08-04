<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resumen</title>
</head>
<body>
<style type="text/css" media="screen">
   .ingreso{ background: #80ff80;
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

  table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <h1>INGRESOS Y EGRESOS DE {{$fechauno}} A {{$fechados}}</h1>
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
                        echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
                        foreach ($ingreso as $key =>$c) {
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
                              echo $key +1;
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
                            echo number_format($c->cantidad, 2, '.', '');
                          echo "</td>";

             
                    ?>
                        </tr>

                        <?php
                        }
                        ?>
                        <tr scope="row">
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="ingreso">INGRESO</td>
                          <td>
                            <h4>$ <?php echo number_format($positivo, 2, '.', '');?></h4>
                          </td>
                        </tr>
                        <tr scope="row">
                        
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="egreso">EGRESO</td>
                          <td>
                          <h4> $ <?php echo number_format($negativo, 2, '.', '');?></h4>
                          </td>
                        </tr>
                        <tr scope="row">
                        <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td class="capital">CAPITAL</td>
                          <td>
                          <h4> $ <?php echo number_format($totalcapital, 2, '.', '');?></h4>
                          </td>
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
                </tr>
                <tr>
                  <th>
                    <strong>Capital</strong>
                  </th>
                  <td>
                   $ <?php echo number_format($ta, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tb, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tc, 2, '.', ''); ?>
                  </td>
                </tr>
                  </tbody>
                </table>
                </div>
                <div class="table-responsive" style="margin-top: 20px;">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                      <th class="TEHUIPANGO" colspan="2">TEHUIPANGO $ <?php echo number_format($t4, 2, '.', ''); ?></th>
                      <th class="EFECTIVO" colspan="2">EFECTIVO $ <?php echo number_format($t5, 2, '.', ''); ?></th>
                      <th class="CIBERCICAP" colspan="2">CIBERCICAP $ <?php echo number_format($t6, 2, '.', ''); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
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
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tt, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($te, 2, '.', ''); ?>
                  </td>
                  <td>
                  <strong>Capital</strong>
                  </td>
                  <td>
                  $ <?php echo number_format($tc, 2, '.', ''); ?>
                  </td>
                </tr>
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>