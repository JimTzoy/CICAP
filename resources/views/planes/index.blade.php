@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                      LISTA DE ANTENAS DE LOS CLIENTES
                </div>
               
                <div class="card-body">
 
                       <a href="{{route('planes.create')}}" class="btn btn-primary">Crear Plan</a> 
                  <div class="table-responsive" style="margin-top: 20px;">
               

                <?php
                
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>ID</th>";
      echo "<th scope=col>NOMBRE</th>";
      echo "<th scope=col>MEGAS</th>";
      echo "<th scope=col>DESCRIPCIÓN</th>";
      echo "<th scope=col>DISPOSITIVOS</th>";
      echo "<th scope=col>PRECIO</th>";
      echo "<th scope=col>FECHA CREADO</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($plan as $p) {
                echo "<tr>";
                echo "<td>";
                    echo $p->id;
                echo "</td>";
                echo "<td>";
                    echo $p->nombre;
                echo "</td>";
                 echo "<td>";
                    echo "<p>".$p->megas." MEGAS</p>";
                echo "</td>";
                echo "<td>";
                    echo $p->descripcion;
                echo "</td>";
                echo "<td>";
                    echo $p->cantdispositivos;
                echo "</td>";
                echo "<td>";
                    echo "$  ".$p->precio;
                echo "</td>";
                echo "<td>";
                    echo $p->created_at;
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('PlanController@edit', $p->id)}}" class="btn btn-primary">EDITAR</a>
                <form action="{{action('PlanController@destroy', $p->id)}}" method="post">
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