@extends('layouts.app')

@section('content')
<style type="text/css" media="screen">
	.d:hover{
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
<div class="conainer-fluid" style="margin-top: 60px; background: #ffff;">
				<div class="row">
					<div class="col-md-3" style="padding: 20px 20px 20px 20px;">
						<div class="card d">
							<img src="/img/img10.png" alt="" class="card-img" style="width: 100%;">
							<div class="card-body" style="padding: 10px 10px 10px 10px;">
								<p><strong>Nombre: </strong> Lucio Texcahua</p>
								<p><strong>Cargo: </strong>Tecnico</p>
								<p><strong>Tel: </strong> 272-192-1545</p>
								<p><strong>Correo: </strong>ventas@internetcicap.com.mx</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 " style="padding: 20px 20px 20px 20px;">
						<div class="card d">
							<img src="/img/img10.png" alt="" class="card-img" style="width: 100%;">
							<div class="card-body" style="padding: 10px 10px 10px 10px;">
								<p><strong>Nombre: </strong> Feliciana Tzoyontle</p>
								<p><strong>Cargo: </strong>Ventas</p>
								<p><strong>Tel: </strong> 272-192-1545</p>
								<p><strong>Correo: </strong>ventas@internetcicap.com.mx</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 " style="padding: 20px 20px 20px 20px;">
						<div class="card d">
							<img src="/img/img10.png" alt="" class="card-img" style="width: 100%;">
							<div class="card-body" style="padding: 10px 10px 10px 10px;">
								<p><strong>Nombre: </strong> Alejandra Texcahua</p>
								<p><strong>Cargo: </strong>Ventas</p>
								<p><strong>Tel: </strong> 272-192-1545</p>
								<p><strong>Correo: </strong>ventas@internetcicap.com.mx</p>
							</div>
						</div>
					</div>
					<div class="col-md-3" style="padding: 20px 20px 20px 20px;">
						<div class="card d">
							<img src="/img/img10.png" alt="" class="card-img" style="width: 100%;">
							<div class="card-body" style="padding: 10px 10px 10px 10px;">
								<p><strong>Nombre: </strong> Samuel Jimenez</p>
								<p><strong>Cargo: </strong>Tecnico</p>
								<p><strong>Tel: </strong> 272-192-1545</p>
								<p><strong>Correo: </strong>ventas@internetcicap.com.mx</p>
							</div>
						</div>
					</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			
		</div>
		<style type="text/css" media="screen">
			.cuadro{
				font-size: 1.4em;
				color: #ffff;
				padding: 10px 10px 10px 10px;
			}
			.a{
				background: #015D8F;
			}
			.b{
				background: #025E73;
			}
			.c{
				background: #011640;
			}
		</style>
		<div class="col-md-6">
			<div class="card" style="padding: 20px 20px 20px 20px;">
				<h1 style="text-align: center;">HORARIO DE ATENCIÓN</h1>
				<div class="cuadro a">
					<p>Lunes 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro b">
					<p>Martes 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro c">
					<p>Miercoles 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro a">
					<p>Juevez 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro b">
					<p>Viernes 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro c">
					<p>Sabado 9:00 AM - 12:00 PM A 14:00 PM - 20:00 PM</p>
				</div>
				<div class="cuadro a">
					<p>Domingo 10:00 AM - 18:00 PM</p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
				
			</div>	
	</div>
</div>

@endsection