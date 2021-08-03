@extends('layouts.vista')

@section('content')
<br><br>
<div class="row">
    <div class="col-md-3">
        
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header" style="text-align: center;" >
                <h5 class="texto">MENSAJE RECIBIDO</h5>
            </div>
            <div class="card-body">
                <p><strong>Nombre: </strong> {{$mensaje->nombre}}</p>
                <p><strong>Telefono: </strong> {{$mensaje->telefono}}</p>
                <p><strong>Correo: </strong> {{$mensaje->correo}}</p>
                <p><strong>Mensaje: </strong></p>
                <p>{{$mensaje->mensaje}}</p>
                
                
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                        <a href="{{route('mensajes.index')}}" title="" class="btn btn-danger">Regresar</a>
                    </div>
                    <div class="col-md-8">
                        <div class="btn-group" role="group">
                            <a href="" class="btn btn-info">RESPONDER</a>
                            <form action="{{action('MensajesController@destroy', $mensaje->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">ELIMINAR</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        
    </div>
</div>



@endsection
