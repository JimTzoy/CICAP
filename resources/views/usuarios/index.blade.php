@extends('layouts.layout')

@section('content')
    <div class="card">

    <div class="row">
        <div class="col-md-12">



                <div class="panel-heading">
                    <a href="{{route('usuarios.create')}}" class="btn btn-primary">Crear usuario</a>
                </div>

                <div class="panel-body">
                <h2>LISTA DE USUARIOS REGISTRADOS</h2>
                <?php
                
                    echo "<table class=\"table table-bordered table-responsive\">";
                    echo "<thead>";
    echo "<tr>";
      echo "<th scope=col>ID</th>";
      echo "<th scope=col>NOMBRE</th>";
      echo "<th scope=col>ROL</th>";
      echo "<th scope=col>IMAGEN</th>";
      echo "<th scope=col>FECHA CREADO</th>";
      echo "<th scope=col>ACCIONES</th>";
    echo "</tr>";
  echo "</thead>";
  echo "<tbody>";
            foreach ($usuario as $u) {
                echo "<tr>";
                echo "<td>";
                    echo $u->id;
                echo "</td>";
                echo "<td>";
                    echo $u->name;
                echo "</td>";
                echo "<td>";
                    echo $u->nomrol;
                echo "</td>";
                echo "<td>";
                    echo "<img width=\"60px\" src=\"img/perfil/".$u->img."\" >";
                echo "</td>";
                echo "<td>";
                    echo $u->created_at;
                echo "</td>";
             
               ?>
                <td>
                <div class="btn-group" role="group">
                <a href="{{action('UsuariosController@edit', $u->id)}}" class="btn btn-primary">EDITAR</a>
                <form action="{{action('UsuariosController@destroy', $u->id)}}" method="post">
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