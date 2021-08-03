@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                      LISTA DE LOS MENSAJES RECIBIDOS
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
      echo "<th scope=col>TELEFONO</th>";
      echo "<th scope=col>CORREO</th>";
      echo "<th scope=col>FECHA CREADO</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($mensaje as $m) {
                echo "<tr>";
                echo "<td>";
                    echo $m->id;
                echo "</td>";
                echo "<td>";
                    echo $m->nombre;
                echo "</td>";
                echo "<td>";
                    echo $m->telefono;
                echo "</td>";
                echo "<td>";
                    echo $m->correo;
                echo "</td>";
                echo "<td>";
                    echo $m->created_at;
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('MensajesController@show', $m->id)}}" class="btn btn-primary">VER</a>
                <form action="{{action('PlanController@destroy', $m->id)}}" method="post">
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