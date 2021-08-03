@extends('layouts.tercero')

@section('content')
<style type="text/css" media="screen">
  .ingreso{
    background: #32D95C;
  }
  .egreso{
    background: #F21628;
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
                    <div class="col-md-12">
                    <a href="{{route('imprimirresumen', [$fechauno,$fechados])}}" style="text-decoration: none;" ><strong>IMPRIMIR</strong></a>
                    </div>
                  </div>
                </div>
               
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
      echo "<th scope=\"col\">DESCRIPCION</th>";
      echo "<th scope=\"col\">NOMBRE</th>";
      echo "<th scope=\"col\">CANTIDAD</th>";
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
                    echo $c->descripcion;
                echo "</td>";
                echo "<td>";
                    echo $c->name;
                echo "</td>";
                echo "<td>";
                    echo $c->cantidad;
                echo "</td>";

             
               ?>
                </tr>

                <?php
                }
                ?>
                <tr>
                  <th></th>
                  <td class="ingreso">INGRESO</td>
                  <td class="ingreso" colspan="2">
                    <h3>$ {{$positivo}}</h3>
                  </td>
                  <td class="egreso">EGRESO</td>
                  <td class="egreso" colspan="2">
                    <h3>$ {{$negativo}}</h3>
                  </td>
                </tr>
                <tr>
                  <td colspan="3">Total</td>
                  <td colspan="3"> <h3>$ {{$total}}</h3></td>
                </tr>
                <?php
                echo "</tbody>";
                echo "</table>";       
                ?>
                 {{ $ingreso->withQueryString()->links() }}
                 </div>
            </div>
        </div>
    </div>
</div>

@endsection