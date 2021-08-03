@extends('layouts.vista')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="texto">Registrar informacion</h5>
                </div>
               
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            
                        </div>
                        <div class="col-md-6">
                            <form class="form-horizontal" method="POST" action="{{ route('ingresos.store') }}" accept-charset="utf-8" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                                    <label for="cantidad" class="col-md-12 control-label">Cantidad</label>

                                    <div class="col-md-12">
                                        <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('nombre') }}" required autofocus onkeyup="mayus(this);">

                                        @if ($errors->has('cantidad'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('cantidad') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                                    <label for="descripcion" class="col-md-12 control-label">Descripcion</label>

                                    <div class="col-md-12">
                                        <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required autofocus>

                                        @if ($errors->has('descripcion'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('descripcion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                               
                                  <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                                    <label for="tipo" class="col-md-12 control-label">Tipo</label>

                                    <div class="col-md-12">
                                        <select id="tipo" class="form-control" name="tipo" value="{{ old('tipo') }}" required autofocus>
                                                <option value=""><---Seleccione una opción---></option>
                                                    <option value="Ingreso">Ingreso</option>
                                                    <option value="Egreso">Egreso</option>
                                        </select>
                                        @if ($errors->has('tipo'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tipo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('idbanco') ? ' has-error' : '' }}">
                                    <label for="idbanco" class="col-md-12 control-label">Banco</label>

                                    <div class="col-md-12">
                                        <select id="idbanco" class="form-control" name="idbanco" value="{{ old('idbanco') }}" required autofocus>
                                            <option value=""><---Seleccione una opción---></option>
                                            <?php
                                            foreach ($banco as $b) {
                                            echo "<option value=\"";
                                            echo $b->id;
                                            echo "\">";
                                            echo $b->nbanco;
                                            echo"</option>";
                                            }
                                            ?>
                                        </select>
                                        @if ($errors->has('idbanco'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('idbanco') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                 <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                    <label for="fecha" class="col-md-12 control-label">Fecha</label>

                                    <div class="col-md-12">
                                        <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('precio') }}" required autofocus>

                                        @if ($errors->has('fecha'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('fecha') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row{{ $errors->has('img') ? ' has-error' : '' }}">
                                  <label for="img" class="col-sm-2 col-form-label">INGRESE IMAGEN</label>

                                  <div class="col-sm-10">
                                    <input id="img" type="file" class="form-control" name="img" value="{{ old('img') }}" accept="image/*" >

                                        @if ($errors->has('img'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('img') }}</strong>
                                            </span>
                                        @endif
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
                        <div class="col-md-3">
                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
