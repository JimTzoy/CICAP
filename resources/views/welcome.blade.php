@extends('layouts.app')

@section('content')
 <style>
  /* Make the image fully responsive */
  .carousel-inner {
    width: 100%;
    height: 100%;
  }
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  /* Carousel base class */
.carousel {
  margin-bottom: 4rem;
}
/* Since positioning the image, we need to help out the caption */
.carousel-caption {
  bottom: 3rem;
  z-index: 10;
}

/* Declare heights because of positioning of img element */
.carousel-item {
  height: 32rem;
  background-color: #777;
}
.carousel-item > img {
  position: absolute;
  top: 0;
  left: 0;
  min-width: 100%;
  height: 32rem;
}
  .pricing-table{
  background-color: #eee;
  font-family: 'Montserrat', sans-serif;
}

.pricing-table .block-heading {
  padding-top: 50px;
  margin-bottom: 40px;
  text-align: center; 
}

.pricing-table .block-heading h2 {
  color: #3b99e0;
}

.pricing-table .block-heading p {
  text-align: center;
  max-width: 420px;
  margin: auto;
  opacity: 0.7; 
}

.pricing-table .heading {
  text-align: center;
  padding-bottom: 10px;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1); 
}

.pricing-table .item {
  background-color: #ffffff;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
  border-top: 2px solid #C4226D;
  padding: 30px;
  overflow: hidden;
  position: relative; 
}

.pricing-table .col-md-5:not(:last-child) .item {
  margin-bottom: 30px; 
}

.pricing-table .item button {
  font-weight: 600; 
}

.pricing-table .ribbon {
  width: 160px;
  height: 32px;
  font-size: 12px;
  text-align: center;
  color: #fff;
  font-weight: bold;
  box-shadow: 0px 2px 3px rgba(136, 136, 136, 0.25);
  background: #C4226D;
  transform: rotate(45deg);
  position: absolute;
  right: -42px;
  top: 20px;
  padding-top: 7px; 
}

.pricing-table .item p {
  text-align: center;
  margin-top: 20px;
  opacity: 0.7; 
}

.pricing-table .features .feature {
  font-weight: 600; }

.pricing-table .features h4 {
  text-align: center;
  font-size: 18px;
  padding: 5px; 
}

.pricing-table .price h4 {
  margin: 15px 0;
  font-size: 45px;
  text-align: center;
  color: #C4226D; 
}
.pricing-table .price h3 {
  margin: 15px 0;
  font-size: 20px;
  text-align: center;
  color: black; 
}

.pricing-table .buy-now button {
  text-align: center;
  margin: auto;
  font-weight: 600;
  padding: 9px 0; 
}

  </style>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner" width="100%">
    <div class="carousel-item active" width="100%">
      <img src="img/img1.png"  width="1100" height="500">
      <div class="carousel-caption">
        <a href="" class="btn btn-danger">Contactanos</a>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/img4.png">
      <div class="carousel-caption">
        <a href="" title="" class="btn btn-danger">Mas información</a>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/img3.png" >
      <div class="carousel-caption">
        <a href="" title="" class="btn btn-danger">Mas información</a>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

 <section class="pricing-table">
        <div class="container">
            <div class="block-heading">
              <h2>Tabla de precios</h2>
              <p>Disfruta el internet ilimatado con los mejores planes que tenemos para ti </p>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="ribbon">Mejor precio</div>
                        <div class="heading">
                            <h3>WIFI 1</h3>
                        </div>
                       <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                       <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">4 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">5 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$ 300</h4>
                            <h3>al mes</h3>
                        </div>
                        <button class="btn btn-block btn-danger" type="submit">Contratar</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>WIFI 2</h3>
                        </div>
                        <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                        <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">6 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">3 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$350</h4>
                            <h3>al mes</h3>
                        </div>
                        <button class="color btn btn-block btn-outline-danger" type="submit">Contratar</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>WIFI 3</h3>
                        </div>
                       <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                       <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">8 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">7 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$ 400</h4>
                            <h3>al mes</h3>
                        </div>
                        <button class="btn btn-block btn-danger" type="submit">Contratar</button>
                    </div>
                </div>
            </div>
          <div class="row justify-content-md-center">
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>WIFI PLUS 1</h3>
                        </div>
                        <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                        <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">10 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">10 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$450</h4>
                            <h3>al mes</h3>
                        </div>
                        <button class="btn btn-block btn-outline-danger" type="submit">Contratar</button>
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>WIFI PLUS 2</h3>
                        </div>
                        <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                        <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">15 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">10 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$500</h4>
                            <h3>al mes</h3>
                        </div>
                        <button class="btn btn-block btn-danger" type="submit">Contratar</button>
                    </div>
                </div>
               <div class="col-md-5 col-lg-4">
                    <div class="item">
                        <div class="heading">
                            <h3>WIFI PLUS 3</h3>
                        </div>
                        <p>El precio mostrado no incluye la instalación y renta de equipo</p>
                        <div class="features">
                            <h4><span class="feature">Velocidad</span> : <span class="value">20 Megas</span></h4>
                            <h4><span class="feature">Duración</span> : <span class="value">30 Dias</span></h4>
                            <!--<h4><span class="feature">Conecta hasta</span> : <span class="value">15 Dispositivos</span></h4>-->
                        </div>
                        <div class="price">
                            <h4>$650 <h3>al mes</h3></h4>
                            
                        </div>
                        <button class="btn btn-block btn-outline-danger" type="submit">Contratar</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection