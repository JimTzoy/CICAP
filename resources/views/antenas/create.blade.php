@extends('layouts.vista')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="texto">Registrar Antena</h5>
                </div>
               
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('antenas.store') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('ip') ? ' has-error' : '' }}">
                                    <label for="ip" class="col-md-12 control-label">IP</label>

                                    <div class="col-md-12">
                                        <input id="ip" type="text" class="form-control" name="ip" value="{{ old('ip') }}" required autofocus onkeyup="mayus(this);">

                                        @if ($errors->has('ip'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ip') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-md-12 control-label">Nombre</label>

                                    <div class="col-md-12">
                                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>

                                        @if ($errors->has('nombre'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('frecuencia') ? ' has-error' : '' }}">
                                    <label for="frecuencia" class="col-md-12 control-label">Frecuencia</label>

                                    <div class="col-md-12">
                                        <input id="frecuencia" type="text" class="form-control" name="frecuencia" value="{{ old('frecuencia') }}" required autofocus>

                                        @if ($errors->has('frecuencia'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('frecuencia') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('canal') ? ' has-error' : '' }}">
                                    <label for="canal" class="col-md-12 control-label">Canal</label>

                                    <div class="col-md-12">
                                        <input id="canal" type="text" class="form-control" name="canal" value="{{ old('canal') }}" required autofocus>

                                        @if ($errors->has('canal'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('canal') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                                    <label for="user" class="col-md-12 control-label">Usuario</label>

                                    <div class="col-md-12">
                                        <input id="user" type="text" class="form-control" name="user" value="{{ old('user') }}" required autofocus>

                                        @if ($errors->has('user'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('user') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('pass') ? ' has-error' : '' }}">
                                    <label for="pass" class="col-md-12 control-label">Contraseña</label>

                                    <div class="col-md-12">
                                        <input id="pass" type="text" class="form-control" name="pass" value="{{ old('pass') }}" required autofocus>

                                        @if ($errors->has('pass'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('pass') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('ubicacion') ? ' has-error' : '' }}">
                                    <label for="ubicacion" class="col-md-12 control-label">Ubicación</label>

                                    <div class="col-md-12">
                                        <input id="ubicacion" type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion') }}" required autofocus>

                                        @if ($errors->has('ubicacion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ubicacion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-4">
                                 <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-12 control-label">Tipo</label>

                                    <div class="col-md-12">
                                         <select id="tipo" class="form-control" name="tipo" value="{{ old('tipo') }}" required autofocus>
                                        <option value=""><---Seleccione una opción---></option>
                                            <option value="ACCES POINT">ACCES POINT</option>
                                            <option value="STATION">STATION</option>
                                </select>

                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                                    <label for="modelo" class="col-md-12 control-label">Modelo</label>

                                    <div class="col-md-12">
                                         <select id="modelo" class="form-control" name="modelo" value="{{ old('modelo') }}" required autofocus>
                                        <option value=""><---Seleccione una opción---></option>
                                            <option value="LiteBeam M5">LiteBeam M5</option>
                                            <option value="NanoStation M2">NanoStation M2</option>
                                            <option value="NanoStation M5">NanoStation M5</option>
                                </select>

                                        @if ($errors->has('modelo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('modelo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('intensidad') ? ' has-error' : '' }}">
                                    <label for="intensidad" class="col-md-12 control-label">Intensidad de la señal</label>

                                    <div class="col-md-12">
                                        <input id="intensidad" type="text" class="form-control" name="intensidad" value="{{ old('intensidad') }}" required autofocus>

                                        @if ($errors->has('intensidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('intensidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-4">
                                 <div class="form-group{{ $errors->has('umbralruido') ? ' has-error' : '' }}">
                                    <label for="umbralruido" class="col-md-12 control-label">Umbral Minimo de Ruido</label>

                                    <div class="col-md-12">
                                        <input id="umbralruido" type="text" class="form-control" name="umbralruido" value="{{ old('umbralruido') }}" required autofocus>

                                        @if ($errors->has('umbralruido'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('umbralruido') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('ccq') ? ' has-error' : '' }}">
                                    <label for="ccq" class="col-md-12 control-label">Trasmitir CCQ</label>

                                    <div class="col-md-12">
                                        <input id="ccq" type="text" class="form-control" name="ccq" value="{{ old('ccq') }}" required autofocus>

                                        @if ($errors->has('ccq'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ccq') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('tx') ? ' has-error' : '' }}">
                                    <label for="tx" class="col-md-12 control-label">Velocidad TX</label>

                                    <div class="col-md-12">
                                        <input id="tx" type="number" class="form-control" name="tx" value="{{ old('tx') }}" required autofocus>

                                        @if ($errors->has('tx'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tx') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-3">
                                 <div class="form-group{{ $errors->has('rx') ? ' has-error' : '' }}">
                                    <label for="rx" class="col-md-12 control-label">Velocidad RX</label>

                                    <div class="col-md-12">
                                        <input id="rx" type="text" class="form-control" name="rx" value="{{ old('rx') }}" required autofocus>

                                        @if ($errors->has('rx'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('rx') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group{{ $errors->has('calidad') ? ' has-error' : '' }}">
                                    <label for="calidad" class="col-md-12 control-label">Calidad AirMax</label>

                                    <div class="col-md-12">
                                        <input id="calidad" type="text" class="form-control" name="calidad" value="{{ old('calidad') }}" required autofocus>

                                        @if ($errors->has('calidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('calidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('capacidad') ? ' has-error' : '' }}">
                                    <label for="capacidad" class="col-md-12 control-label">Capacidad AirMax</label>

                                    <div class="col-md-12">
                                        <input id="capacidad" type="text" class="form-control" name="capacidad" value="{{ old('capacidad') }}" required autofocus>

                                        @if ($errors->has('capacidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('capacidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="col-md-6">
                                 <div class="form-group{{ $errors->has('conectadoa') ? ' has-error' : '' }}">
                                    <label for="conectadoa" class="col-md-12 control-label">Antena conectado</label>

                                    <div class="col-md-12">
                                        <input id="conectadoa" type="text" class="form-control" name="conectadoa" value="{{ old('conectadoa') }}" required autofocus>

                                        @if ($errors->has('conectadoa'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('conectadoa') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div> 
                        </div>
                         <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    
        function mayus(e) {
            e.value = e.value.toUpperCase();
    }
</script>
@endsection
