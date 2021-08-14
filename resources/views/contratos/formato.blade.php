@extends('layouts.segundo')

@section('content')

    <div class="row justify-content-center" style="font-size: 1.2em; font-family:  Lucida Console, Courier, monospace;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      
                    </div>
                    <div class="col-md-8"  style="text-align: center;">
                      <h2>RECIBO DE PAGO DE INTERNET</h2>
                    </div>
                    <div class="col-md-2">
                      <a href="{{route('imprimir', $ids)}}" class="btn btn-primary">IMPRIMIR FORMATO</a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p>Fecha: <strong><?php foreach ($pagos as $p) {
                        echo date('d-m-Y', strtotime($p->fechapago));
                      } ?></strong></p>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-4">
                        <p>Paquete: <strong><?php foreach ($contra as $con) {
                          echo $con->nombre;
                        } ?></strong> </p>
                      </div>
                      <div class="col-md-4">
                        <p>Inicio: <strong><?php foreach ($pagos as $pa) {
                        echo date('d-m-Y', strtotime($pa->fechainicio));
                     ?></strong></p>
                      </div>
                      <div class="col-md-4">
                        <p>Fin: <strong> <?php echo date('d-m-Y', strtotime($pa->fechafin));   ?></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p>Siguiente pago:  <strong><?php echo strtoupper(strftime("%d de %B del %Y", strtotime(date('d-m-Y', strtotime($pa->fechafin))))); }?></strong>  (Pago por anticipado)</p>
                        <p>Nota: Favor de anticipar su pago en CIBERCICAP o a los numeros de cuenta correspondiente, de lo contrario se cortará el servicio</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <p>Recibí de: <strong><?php foreach ($contra as $c) {
                          echo $c->nombrecompleto;
                        } ?></strong></p>
                      </div>
                      <div class="col-md-6">
                        <p>la cantidad de: <strong> <?php foreach ($pagos as $pago) {
                          echo $pago->cantidad." Pesos";
                        ?></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p>Observaciones:  <strong><?php echo $pago->observacion; } ?></strong></p>
                      </div>
                    </div>
                    <div class="row" style="text-align: center;">
                      <div class="col-md-12">
                        <img src="../../img/img5.png" alt="" style="width: 100px; height:100px ">
                         <p>Lucio Texcahua Zepahua</p>
                      <p>Si su servicio presenta alguna falla, favor de reportelo al<strong> 272-126-0141</strong> o al <strong>2722843738</strong></p>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-12">
                      <h4 style="text-align: center;">FALLAS</h4>
                      <p>En el caso de tener problemas con su servicio favor de reportarlo, para poder darle 
                      solución a la brevedad posible para reponer los días perdidos a partir de su reporte.   </p> 
                      <p style="line-height:1%;">Cel. (WhatsApp):<strong> 272 126 0141</strong></p>

                    </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
@endsection