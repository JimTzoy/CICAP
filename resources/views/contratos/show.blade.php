@extends('layouts.vista')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{route('contratos.index')}}" title="" class="btn btn-danger">Regresar</a>
                    </div>
                    <div class="col-md-4">
                        <h5 class="texto">INFORMACIÓN DE CONTRATO</h5>
                    </div>
                    <div class="col-md-6" style="text-align: center;">
                        <div class="btn-group" role="group">
                            <a href="{{action('ContratosController@edit', $contrato->id)}}" class="btn btn-primary">EDITAR</a>
                            <form action="{{action('ContratosController@destroy', $contrato->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">ELIMINAR</button>
                            </form>
                            <a href="{{route('cancelar', $contrato->id)}}"class="btn btn-warning">CANCELAR</a>
                            <a href="{{route('regalo', $contrato->id)}}" class="btn btn-dark">REGALO</a>
                        </div>
                        </div>
                    </div>
                </div>
                            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-md-2" style="background: #9BB5BF;">
                        <p><strong>Numero cliente</strong></p>
                        <p>{{$contrato->numerocliente}}</p>
                    </div>
                    <div class="col-sm-6 col-md-4" style="background: #6D96A6;">
                        <p><strong>Nombre cliente</strong></p>
                        <p>{{$contrato->nombrecompleto}}</p>
                    </div>
                    <div class="col-sm-6 col-md-4" style="background: #496773;">
                        <p><strong>Dirección</strong></p>
                        <p>{{$contrato->domicilio}}</p>                        
                    </div>
                    <div class="col-sm-6 col-md-2" style="background: #929AA6;">
                        <p><strong>Telefono</strong></p>
                        <p>{{$contrato->telefono}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-4 col-md-2" style="background: #496773;">
                        <p><strong>IP cliente</strong></p>
                        <p>{{$contrato->ipcliente}}</p>       
                    </div>
                    <div class="col-6 col-sm-4 col-md-2" style="background: #9BB5BF;">
                        <p><strong>IP antena</strong></p>
                        <p>{{$contrato->ipantena}}</p>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2" style="background: #929AA6;">
                        <p><strong>Fecha contrato</strong></p>
                        <p>{{$contrato->fechacontrato}}</p>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2" style="background: #9BB5BF;">
                        <p><strong>Fecha inicio</strong></p>
                        <p>{{$contrato->fechainicio}}</p>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2" style="background: #6D96A6;">
                        <p><strong>Fecha fin</strong></p>
                        <p>{{$contrato->fechafin}}</p>
                    </div>
                    <div class="col-6 col-sm-4 col-md-2" style="background: #496773;">
                        <p><strong>Costo instalación</strong></p>
                        <p>{{$contrato->instalacion}}</p>
                    </div> 
                </div>
                <div class="row">
                    <?php foreach ($contra as $c) {?>
                    <div class="col-sm-6 col-md-2" style="background: #9BB5BF;">
                        <p><strong>Plan</strong></p>
                        <p><?php echo $c->plan_id; ?></p>
                    </div>
                    <div class="col-sm-6 col-md-4" style="background: #6D96A6;">
                        <p><strong>Precio plan</strong></p>
                        <p><?php echo $c->precio; ?></p>
                    </div>
                    <div class="col-sm-6 col-md-4" style="background: #496773;">
                        <p><strong>Antena</strong></p>
                        <p><?php echo $c->modelo; ?></p>                        
                    </div>
                    <div class="col-sm-6 col-md-2" style="background: #929AA6;">
                        <p><strong>Tecnico</strong></p>
                        <p><?php echo $c->tecnico_id; ?></p>
                    </div>
                <?php } ?>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6" style="background: #516373;">
                        <p><strong>Estatus</strong></p>
                        <p>{{$contrato->status}}</p>
                    </div>
                    <div class="col-sm-6 col-md-6" style="background: #6D96A6;">
                        <p><strong>Observaciones</strong></p>
                        <p>{{$contrato->observacion}}</p>
                    </div>
                </div>
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="btn-group" role="group">
                            <a href="{{action('ContratosController@show', $contrato->id)}}" class="btn btn-primary">VER</a>
                            <a href="{{route('index', $contrato->id)}}" class="btn btn-info">PAGAR</a>
                            <a href="{{route('suspender', $contrato->id)}}" class="btn btn-danger">SUSPENDER</a>
                            <a href="{{route('cancelar', $contrato->id)}}"class="btn btn-danger">CANCELAR</a>
                            <a href="{{route('regalo', $contrato->id)}}" class="btn btn-dark">REGALO</a>
   
                        </div>  
                    </div>
                </div>-->
        </div>
    </div>
</div>


@endsection
