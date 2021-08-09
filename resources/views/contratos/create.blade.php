@extends('layouts.vista')

@section('content')
<style type="text/css">
    .panell{
    width:80%;
    margin: 20px auto;
    border-radius:10px;
    border-style: double;
    border-color:#D99101;
}

.texto{
    font-size: 2.2em;
    text-align: center;
}

</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="texto">Registrar Contrato</h5>
                </div>
               
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('contratos.store') }}">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('numerocliente') ? ' has-error' : '' }}">
                                <label for="numerocliente" class="col-md-12 control-label" >Numero Cliente <a href="#" class="fas fa-question-circle" data-toggle="popover" title="Numero cliente" data-content="El numero de cliente son los ultimos digitos despues del punto de la ip de antena"></a></label>

                                <div class="col-md-12">
                                    <input id="numerocliente" type="text" class="form-control" name="numerocliente" value="{{ old('numerocliente') }}" required autofocus onkeyup="mayus(this);">

                                    @if ($errors->has('numerocliente'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('numerocliente') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('nombrecompleto') ? ' has-error' : '' }}">
                                <label for="nombrecompleto" class="col-md-12 control-label">Nombre Completo</label>

                                <div class="col-md-12">
                                    <input id="nombrecompleto" type="text" class="form-control" name="nombrecompleto" value="{{ old('nombrecompleto') }}" required autofocus onkeyup="mayus(this);">

                                    @if ($errors->has('nombrecompleto'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nombrecompleto') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('domicilio') ? ' has-error' : '' }}">
                                <label for="domicilio" class="col-md-12 control-label">Domicilio</label>

                                <div class="col-md-12">
                                    <input id="domicilio" type="text" class="form-control" name="domicilio" value="{{ old('domicilio') }}" required autofocus>

                                    @if ($errors->has('domicilio'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('domicilio') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                                <label for="telefono" class="col-md-12 control-label">Telefono</label>

                                <div class="col-md-12">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('ipcliente') ? ' has-error' : '' }}">
                            <label for="ipcliente" class="col-md-12 control-label">IP Cliente <a href="#" class="fas fa-question-circle" data-toggle="popover" title="IP cliente" data-content="El IP que debe de ingresar es el ip que le asigno a al moden o router"></a></label>

                            <div class="col-md-12">
                                <input id="ipcliente" type="text" class="form-control" name="ipcliente" value="{{ old('ipcliente') }}" required autofocus>

                                @if ($errors->has('ipcliente'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ipcliente') }}</strong>
                                    </span>
                                @endif
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group{{ $errors->has('ipantena') ? ' has-error' : '' }}">
                            <label for="ipantena" class="col-md-12 control-label">IP Antena <a href="#" class="fas fa-question-circle" data-toggle="popover" data-trigger="focus" title="IP antena" data-content="El IP que debe de ingresar es el IP que le puso a la antena exterior"></a></label>

                            <div class="col-md-12">
                                <input id="ipantena" type="text" class="form-control" name="ipantena" value="{{ old('ipantena') }}" required autofocus>

                                @if ($errors->has('ipantena'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ipantena') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                             <div class="form-group{{ $errors->has('fechacontrato') ? ' has-error' : '' }}">
                            <label for="fechacontrato" class="col-md-12 control-label">Fecha contrato <a href="#" class="fas fa-question-circle" data-toggle="popover" data-trigger="focus" title="Fecha Contrato" data-content="Es la fecha que se utiliza el dia de la instalación"></a></label>

                            <div class="col-md-12">
                                <input id="fechacontrato" type="date" class="form-control" name="fechacontrato" value="{{ old('fechacontrato') }}" required autofocus>

                                @if ($errors->has('fechacontrato'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechacontrato') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('fechainicio') ? ' has-error' : '' }}">
                            <label for="fechainicio" class="col-md-12 control-label">Fecha inicio <a href="#" class="fas fa-question-circle" data-toggle="popover" data-trigger="focus" title="Fecha inicio" data-content="Es la fecha un dia despues del contrato"></a></label>

                            <div class="col-md-12">
                                <input id="fechainicio" type="date" class="form-control" name="fechainicio" value="{{ old('fechainicio') }}" required autofocus>

                                @if ($errors->has('fechainicio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechainicio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                             <div class="form-group{{ $errors->has('fechafin') ? ' has-error' : '' }}">
                            <label for="fechafin" class="col-md-12 control-label">Fecha fin <a href="#" class="fas fa-question-circle" data-toggle="popover" data-trigger="focus" title="Fecha fin" data-content="Es la fecha un mes despues "></a></label>

                            <div class="col-md-12">
                                <input id="fechafin" type="date" class="form-control" name="fechafin" value="{{ old('fechafin') }}" required autofocus>

                                @if ($errors->has('fechafin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechafin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>

                    </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('instalacion') ? ' has-error' : '' }}">
                                <label for="instalacion" class="col-md-12 control-label">Costo Instalación</label>

                                <div class="col-md-12">
                                    <input id="instalacion" type="tex" class="form-control" name="instalacion" value="{{ old('instalacion') }}" required autofocus>
                                    @if ($errors->has('instalacion'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('instalacion') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                <label for="cantidad" class="col-md-12 control-label">Costo mensualidad</label>

                                <div class="col-md-12">
                                    <input id="cantidad" type="tex" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>
                                    @if ($errors->has('cantidad'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('cantidad') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                </div>
                            </div>

                        <div class="col-md-3">
                             <div class="form-group{{ $errors->has('plan_id') ? ' has-error' : '' }}">
                            <label for="plan_id" class="col-md-12 control-label">Plan</label>

                            <div class="col-md-12">
                                <select id="plan_id" class="form-control" name="plan_id" value="{{ old('plan_id') }}" required autofocus>
                                        <option value=""><---Seleccione una opción---></option>
                                        <?php
                                        foreach ($planes as $p) {

                                        echo "<option value=\"";
                                        echo $p->id;
                                        echo "\">";
                                        echo $p->nombre." / ";
                                        echo $p->megas." Megas ";
                                        echo " / $ ";
                                        echo $p->precio;
                                        echo"</option>";
                                        }
                                        ?>
                                </select>
                                @if ($errors->has('plan_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('plan_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group{{ $errors->has('antena_id') ? ' has-error' : '' }}">
                            <label for="antena_id" class="col-md-12 control-label">Antena <a href="#" class="fas fa-question-circle" data-toggle="popover" data-trigger="focus" title="Antena" data-content="Elige de la lista la ip que registraste como su antena"></a></label>

                            <div class="col-md-12">
                                <select id="antena_ip" class="form-control" name="antena_id" value="{{ old('antena_id') }}" required autofocus>
                                        <option value=""><---Seleccione una opción---></option>
                                        <?php
                                        foreach ($antenas as $a) {
                                        echo "<option value=\"";
                                        echo $a->id;
                                        echo "\">";
                                        echo $a->ip;
                                        echo"</option>";
                                        }
                                        ?>
                                </select>
                                @if ($errors->has('antena_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('antena_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('observacion') ? ' has-error' : '' }}">
                            <label for="observacion" class="col-md-12 control-label">Observaciones</label>

                            <div class="col-md-12">
                                <input id="observacion" type="text" class="form-control" name="observacion" value="{{ old('observacion') }}" required autofocus>

                                @if ($errors->has('observacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observacion') }}</strong>
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
<script type="text/javascript">
$(document).ready(function(){
  $('[data-toggle="popover"]').popover();   
});
</script>

@endsection
