<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
   <link rel="stylesheet" href="../../css/bootstrap.min.css">

</head>
<body>
  <div class="container-fluid">
  	  <div class="row" style="font-size: 0.8em; font-family:  Lucida Console, Courier, monospace;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12"  style="text-align: center;">
                      <h2  style="line-height:1%;">RECIBO DE PAGO DE INTERNET</h2>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <p >Fecha: <strong><?php foreach ($pagos as $p) {
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
                        } ?></strong>  Inicio: <strong><?php foreach ($pagos as $pa) {
                        echo date('d-m-Y', strtotime($pa->fechainicio));
                     ?></strong>  Fin: <strong> <?php echo date('d-m-Y', strtotime($pa->fechafin));   ?></strong></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p>Siguiente pago:  <strong><?php echo strtoupper(strftime("%d de %B del %Y", strtotime(date('d-m-Y', strtotime($pa->fechafin))))); }?></strong>  (Pago por anticipado)</p>
                        <p>Nota: Favor de anticipar su pago en CICAP con Alejandra, de lo contrario se cortará el servicio</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <p>Recibí de: <strong><?php foreach ($contra as $c) {
                          echo $c->nombrecompleto;
                        } ?></strong> la cantidad de:  <strong> <?php foreach ($pagos as $pago) {
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
                      <div class="col-md-12" >
                      	<img src="./img/img5.png" alt="" style="width: 100px;">
                         <p>Lucio Texcahua Zepahua</p>
                      <p>Si su servicio presenta alguna falla, favor de reportelo al<strong> 2721893654</strong> o al <strong>2722843738</strong></p>
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <h4 style="text-align: center;line-height:1%;">CONTRATO DE INTERNET </h4>
                      <p>1.  Este contrato se conforma del prestador de servicio y el cliente, que inicia a partir de que el cliente solicita el servicio de internet.</p>
                      <p>2.- El equipo instalado es propiedad del prestador de servicio, al contratar dicho servicio el cliente paga: <strong>A) PRIMERA MENSUALIDAD B) INSTALACIÓN C) CONFIGURACIÓN D) RENTA DEL EQUIPO</strong></p>
                      <p>3.- Las mensualidades son por anticipado y le dan derecho a un recibo de pago con el cual podrá pedir la reposición del tiempo de servicio o reembolso en caso de fallas mayor a 24 horas.</p>
     
                      <p>Fallas: En el caso de tener problemas con su servicio favor de reportarlo, para poder darle 
                      solución a la brevedad posible para reponer los días perdidos a partir de su reporte.   </p> 
                      <p>Cel. (WhatsApp):<strong> 272 7844107</strong></p>

                    </div>
                  </div>
                    <div class="row">
                      <style type="text/css" media="screen">
                            .final{
                                color: #ffff;
                            }
                      </style>
                      <table>
                        <thead>
                          <tr>
                            <th><img src="./img/img5.png" alt="" style="width: 100px;"></th>
                            <th><p class="final">hhhhhhhhhhhhhhhhhhhh</p></th>
                            <th><p> </p></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><p >Lucio Texcahua Zepahua</p></td>
                            
                            <th><p class="final"></p>                    </th>
                            <td><p><?php foreach ($contra as $nom) { echo $nom->nombrecompleto;} ?>
                            </p><p>            Cliente        </p></td>
                          </tr>
                           <tr>
                            <?php foreach ($contra as $cont) {?>
                            <td><p>Direccion:   <?php echo $cont->domicilio; ?></p></td>
                            <th><p class="final"></p>                    </th>
                            <td><p>Telefono:     <?php echo $cont->telefono; } ?>   </p></td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</body>
</html>