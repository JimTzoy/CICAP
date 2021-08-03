@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="font-family: Courier New; font-size: 1.5em; text-align: justify;">
				<div class="card-header" style="text-align: center;">
					<h1>PASOS PARA CAMBIAR LA CONTRASEÑA</h1>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-8">
							<img src="img/c1.png" alt="" style="width: 100%">
						</div>
						<div class="col-md-4">
							<h1>PASO 1</h1>
							<p>Ingresa a la pagina <a href="tplinkwifi.net" title="">tplinkwifi.net</a> o al <a href="192.168.0.1" title="">192.168.0.1</a> o al <a href="192.168.1.1" title="">192.168.1.1</a> </p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4">
							<h1>PASO 2</h1>
							<P>Ingresa el nombre de usuario y contraseña. el usuario y contraseña es "admin"</P>
						</div>
						<div class="col-md-8">
							<img src="img/c2.png" alt="" style="width: 100%">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<img src="img/c3.png" alt="" style="width: 100%">
						</div>
						<div class="col-md-4">
							<h1>PASO 3</h1>
							<p>Una vez dentro de la página nos dirigimos al menú izquierdo y seleccionamos la opción de <strong>inalámbrico.</strong> En esta opción nos muestra el nombre de nuestra red, en dado caso que deben cambiar el nombre solo ponen otro y le dan clic al botón guardar. Una vez echo esto se conectan a la nueva red.</p>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-4">
							<h1>PASO 4</h1>
							<P>En el menú izquierdo seleccionamos la opción <strong>inalámbrico</strong> y después <strong>seguridad inalámbrica</strong>, en donde nos muestra la contraseña que tiene el modem, el cual puede ser cambiado las veces que desee. Una vez escrito la nueva contraseña se da clic en el botón guardar.  </P>
						</div>
						<div class="col-md-8">
							<img src="img/c4.png" alt="" style="width: 100%">
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-8">
							<img src="img/c5.png" alt="" style="width: 100%">
						</div>
						<div class="col-md-4">
							<h1>TIP </h1>
							<p>En el menu se selecciona la opción <strong>DHCP</strong>  y despues <strong>Lista de clientes DHCP</strong> el cual nos muestra la cantidad de dispositivos conectados en nuestra red</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection 
