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
                <div class="card-header">
                  HISTORIAL DE PAGOS  
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-4">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                            Registrar
                        </button>
                        <a href="{{url('mikrotiks/limites')}}" class="btn btn-danger">DESACTIVAR</a> 
                      </div>
                      <div class="col-md-8">
                          <div >
                            <form  method="get" action="/mkbuscar">
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="busqueda" id="busqueda" required="">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                     
                                  </div>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                    <div class="table-responsive">
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
                                      <?php 
                                       if($p['disabled'] == 'true'){
                                      ?>
                                      <a href="{{action('MikrotikController@activar', $p['.id'])}}" class="btn btn-primary">ACTIVAR</a>
                                      <?php  
                                      }else{
                                      ?>
                                      <a href="{{action('MikrotikController@desactivar', $p['.id'])}}" class="btn btn-danger">DESACTIVAR</a>
                                      <?php
                                      }?>
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
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="text-align: center;">BUSCAR ENTRE FECHAS</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            <form class="form-horizontal" method="POST" action="{{ route('mikrotiks.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('mac') ? ' has-error' : '' }}">
                            <label for="mac" class="col-md-12 control-label"> MAC ADDRESS</label>

                            <div class="col-md-12">
                                <input id="mac" type="text" class="form-control" name="mac" value="{{ old('mac') }}" required autofocus>

                                @if ($errors->has('mac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('server') ? ' has-error' : '' }}">
                            <label for="server" class="col-md-12 control-label">SERVIDOR</label>

                            <div class="col-md-12">
                                <select id="server" type="text" class="form-control" name="server" value="{{ old('server') }}" required autofocus>
                                    <option value=""><---SELECCIONE UNA OPCION---></option>
                                    <option value="hotspot1">hotspot1</option>
                                    <option value="hotspot2">hotspot2</option>
                              </select>
                                @if ($errors->has('server'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('server') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <label for="comment" class="col-md-12 control-label">COMENTARIO</label>

                            <div class="col-md-12">
                                <input id="comment" type="text" class="form-control" name="comment" value="{{ old('comment') }}" required autofocus>

                                @if ($errors->has('comment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">REGISTRAR</button>
              </form>
      </div>
    </div>
  </div>
</div>
@endsection