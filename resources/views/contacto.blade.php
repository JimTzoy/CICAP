@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
	.imgd{
		 background-image: url("img/img3.png");
		 background-repeat: no-repeat;
		 background-size: cover;
	}
</style>
<div class="imgd container-fluid">
	<br> <br>
  <div class="row">
  	<div class="col-md-3">
  		
  	</div>
  	<div class="col-md-6">
  		<div class="card"style="background-color: rgba(0, 0, 0, 0.7); color: #ffff">
  			<div class="card-header">
  				<h1 style="text-align: center;">CONTACTANOS</h1>
  			</div>
  			<div class="card-body" >
  				<div class="row">
  					<div class="col-md-6">
  						<div class="">
  							<form class="form-horizontal" method="POST" action="{{ route('mensajes.store') }}">
                        		{{ csrf_field() }}
			                    <div class="row">
			                        	<div class="col-md-12">
				                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
				                                <div class="col-md-12">
				                                    <input style="background-color:rgba(0, 0, 0, 0);border-width: 0px 0px 4px 0px; color: #ffff; font-size: 1.2em;" id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required placeholder="Nombre">

				                                    @if ($errors->has('nombre'))
				                                        <span class="help-block">
				                                            <strong>{{ $errors->first('nombre') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                            </div>
			                            </div>
			                            <div class="col-md-12">
				                            <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
				                                <div class="col-md-12">
				                                     <input style="background-color:rgba(0, 0, 0, 0);border-width: 0px 0px 4px 0px; color: #ffff; font-size: 1.2em;" id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required placeholder="Numero teléfono">

				                                    @if ($errors->has('telefono'))
				                                        <span class="help-block">
				                                            <strong>{{ $errors->first('telefono') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                            </div>
			                            </div>
			                            <div class="col-md-12">
				                            <div class="form-group{{ $errors->has('correo') ? ' has-error' : '' }}">
				                                <div class="col-md-12">
				                                     <input style="background-color:rgba(0, 0, 0, 0);border-width: 0px 0px 4px 0px; color: #ffff; font-size: 1.2em;" id="correo" type="text" class="form-control" name="correo" value="{{ old('correo') }}" required placeholder="Correo electrónico">

				                                    @if ($errors->has('correo'))
				                                        <span class="help-block">
				                                            <strong>{{ $errors->first('correo') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                            </div>
			                            </div>
			                            <div class="col-md-12">
				                            <div class="form-group{{ $errors->has('mensaje') ? ' has-error' : '' }}">
				                                <div class="col-md-12">
				                                    <textarea class="form-control" name="mensaje" value="{{ old('mensaje') }}" style="background-color:rgba(0, 0, 0, 0); border-width: 0px 0px 4px 0px; color: #ffff; font-size: 1.2em;"  rows="4" cols="50" placeholder="Escribe tu mensaje"></textarea>

				                                    @if ($errors->has('mensaje'))
				                                        <span class="help-block">
				                                            <strong>{{ $errors->first('mensaje') }}</strong>
				                                        </span>
				                                    @endif
				                                </div>
				                            </div>
			                            </div>
			                  		</div>
			                  		<div class="form-group">
                            <div class="col-md-12" style="font-size: 1.5em;">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    Enviar mensaje 
                                </button>
                            </div>
                        </div>
  							</form>
  						</div>
  					</div>
  					<div class="col-md-6" style="text-align: center; font-size: 1.3em;">
  						<div style="text-align: left">
  							<p><span class="fas fa-phone"> </span>   272-189-36-54</p>
  							<p><span class="fas fa-envelope"> </span> <a href="mailto:soporte@internetcicap.com.mx">  soporte@internetcicap.com.mx</a></p>
  							<p><span class="fab fa-facebook-square"> </span> <a href="https://fb.me/internetCICAP" title=""> Internet CICAP </a></p>
  							<p><span class="fab fa-facebook-messenger"></span> <a href="https://m.me/internetCICAP" title=""> Messenger</a></p>

  						</div> 
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="col-md-3">
  		
  	</div>
  </div>
  <br><br>
</div>
@endsection 
