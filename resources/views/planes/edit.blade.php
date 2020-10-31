@extends('layouts.segundo')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('planes.index')}}" title="" class="btn btn-danger">Regresar</a>
                        </div>
                        <div class="col-md-8">
                            <h5 class="texto">EDITAR INFORMACIÓN DEl PLAN</h5>
                        </div>
                        <div class="col-md-2">
                            
                        </div>
                    </div>
                </div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-6">
                            <form class="form-horizontal" method="POST" action="{{ route('planes.update', $plan->id) }}">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PATCH">
                                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-md-12 control-label">Nombre</label>

                                    <div class="col-md-12">
                                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ $plan->nombre }}" required autofocus onkeyup="mayus(this);">

                                        @if ($errors->has('nombre'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('megas') ? ' has-error' : '' }}">
                                    <label for="megas" class="col-md-12 control-label">Megas</label>

                                    <div class="col-md-12">
                                        <input id="megas" type="text" class="form-control" name="megas" value="{{ $plan->megas }}" required autofocus>

                                        @if ($errors->has('megas'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('megas') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                 <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                    <label for="descripcion" class="col-md-12 control-label">Descripcion</label>

                                    <div class="col-md-12">
                                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ $plan->descripcion }}" required autofocus>

                                        @if ($errors->has('descripcion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group{{ $errors->has('cantdispositivos') ? ' has-error' : '' }}">
                                    <label for="cantdispositivos" class="col-md-12 control-label">Cantidad dispositivos</label>

                                    <div class="col-md-12">
                                        <input id="cantdispositivos" type="text" class="form-control" name="cantdispositivos" value="{{ $plan->cantdispositivos }}" required autofocus>

                                        @if ($errors->has('cantdispositivos'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cantdispositivos') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                                    <label for="precio" class="col-md-12 control-label">Precio</label>

                                    <div class="col-md-12">
                                        <input id="precio" type="text" class="form-control" name="precio" value="{{ $plan->precio }}" required autofocus>

                                        @if ($errors->has('precio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('precio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Actualizar
                                        </button>
                                    </div>
                                </div>
                            </form> 
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                        
                    </div>

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