<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>Internet CICAP</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link href=" 5/css/bootstrap.min.css" rel="stylesheet">
    <link href="5/css/fontawesome-all.min.css" rel="stylesheet">
    <link href="5/css/aos.min.css" rel="stylesheet">
    <link href="5/css/swiper.css" rel="stylesheet">
    <link href="5/css/style.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="./assets/images/favicon.png">
</head>
<body>
    
    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark" aria-label="Main navigation">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="index.html"><img src="images/logo.svg" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text" href="index.html">InternteCicap</a>

            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault" >
                <ul class="navbar-nav ms-auto navbar-nav-scroll">
                  @guest
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#header">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#plans">Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}"><span class="fas fa-sign-in-alt"> </span> Entrar</a>
                    </li>
                    @if(Route::has('register'))
                               <!-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #fff; font-size: 0.7em;"><span class="fas fa-user"> </span> Registrarte</a>
                                </li>-->
                          @endif
                        @else
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                                  <li>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <span class="fas fa-tachometer-alt"> </span> Desboard
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="fas fa-sign-out-alt"> </span> 
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </li>
                                </ul>
                            </li>
                                    
                  @endguest
                </ul>
                <span class="nav-item social-icons">
                    <span class="fa-stack">
                        <a href="https://www.facebook.com/internetCICAP/">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </a>
                    </span>
                    <span class="fa-stack">
                        <a href="#your-link">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-twitter fa-stack-1x"></i>
                        </a>
                    </span>
                </span>
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Home -->
    <section class="home py-5 d-flex align-items-center" id="header">
        <div class="container text-light py-5"  data-aos="fade-right"> 
            <h1 class="headline">Los mejores planes de internet de <span class="home_text">banda ancha </span>para ti</h1>
            <p class="para para-light py-3">Internet cicap cuenta con planes que se acomodan a su presupuesto y sin plazos forzosos</p>
            <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-laptop-house fa-lg"></i></p>
                <p>Internet en casa</p>  
            </div>
            <div class="d-flex align-items-center">
                <p class="p-2"><i class="fas fa-wifi fa-lg"></i></p>
                <p>Internet ilimitado</p>  
            </div>
            <div class="my-3">
                <a class="btn" href="#plans">Ver Planes</a>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of home -->


    <!-- Information -->
    <section class="information">
        <div class="container-fluid">  
            <div class="row text-light">
                <div class="col-lg-4 text-center p-5" data-aos="zoom-in">
                    <i class="fas fa-tachometer-alt fa-3x p-2"></i>
                    <h4 class="py-3">Consumo ILIMITADO</h4>
                    <p class="para-light">Descargue contenido sin procuparse por su consumo</p>
                </div>
                <div class="col-lg-4 text-center p-5"  data-aos="zoom-in">
                    <i class="fas fa-clock fa-3x p-2"></i>
                    <h4 class="py-3">99% de actividad Internet</h4>
                    <p class="para-light">Nuestros equipos instalados brindan un 99 % de eficiencia</p>
                </div>
                <div class="col-lg-4 text-center p-5 text-dark"  data-aos="zoom-in"> 
                    <i class="fas fa-headset fa-3x p-2"></i>
                    <h4 class="py-3">Soporte 24/7</h4>
                    <p class="para-light">Atendemos sus reportes lo mas pronto posible</p>
                </div>
            </div>
        </div> <!-- end of container -->
    </section> <!-- end of information -->
    

    <!-- About -->
    <section class="about d-flex align-items-center text-light py-5" id="about">
        <div class="container" >
            <div class="row d-flex align-items-center">
                <div class="col-lg-7" data-aos="fade-right">
                    <p>SOBRE NOSOTROS</p>
                    <h1>Somos la mejor empresa<br> de servicios de internet</h1>
                    <p class="py-2 para-light">Internte CICAP se dedica a llevar internet a todo el valle de TUXPANGO con soluciones inteligentes que garantizan un buen funcionamiento </p>
                    <p class="py-2 para-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non sed accusantium aut dolores inventore architecto modi cupiditate eligendi corporis, illum illo culpa. Reiciendis, molestias. Illum voluptatum quisquam ad veritatis dolorem.</p>

                    <div class="my-3">
                        <a class="btn" href="#your-link">Leer más</a>
                    </div>
                </div>
                <div class="col-lg-5 text-center py-4 py-sm-0" data-aos="fade-down"> 
                    <img class="img-fluid" src="img/img12.jpg" alt="about" >
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of about -->


    <!-- Services -->
    <section class="services d-flex align-items-center py-5" id="services">
        <div class="container text-light">
            <div class="text-center pb-4" >
                <p>COBERTURA</p> 
                <h2 class="py-2">Explore las posiblidades ilimitadas del internet</h2>
                <p class="para-light"> <a href="#contact" class="btn">Contactenos</a>      para mas informacion sobre nuestra cobertura</p>
            </div>
            <div class="row gy-4 py-2" data-aos="zoom-in">
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                    <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">CAPOLUCA</h4>
                        <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>-->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                    <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">TUXPANGUILLO</h4>
                        <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>-->
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                    <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">CAMPO GRANDE</h4>
                      <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>--->
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">CUMBRE DE TUXPANGO</h4>
                        <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>-->
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                    <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">CAMPO CHICO</h4>
                        <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>-->
                    </div>                    
                </div>
                <div class="col-lg-4">
                    <div class="card bg-transparent">
                        <i class="fas fa-broadcast-tower fa-4x"></i>
                        <h4 class="py-2">CUESTA DEL MEXICANO</h4>
                        <!--<p class="para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam odit consequatur doloribus natus in suscipit!</p>--->
                    </div>                    
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of services -->


    <!-- Plans -->
    <section class="plans d-flex align-items-center py-5" id="plans">
        <div class="container text-light" >
            <div class="text-center pb-4">
                <p>NUESTROS PLANES</p>
                <h2 class="py-2">Explore las posiblidades ilimitadas del internet</h2>
                <p class="para-light">Disfrute del internet ilimitado con los mejores planes que tenemos para ti. Los planes mostrados no cuentan con el precio de instalación</p>
            </div>
            <div class="row gy-4" data-aos="zoom-in">
                <div class="col-lg-4">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">WIFI 1</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 4 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 4 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$300/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>
                        </div>
                    </div>  
                </div>

                <div class="col-lg-4">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">WIFI 2</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 6 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 6 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$350/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>
                        </div>
                    </div>  
                </div>

                <div class="col-lg-4">
                    <div class="card bg-transparent px-4" >
                        <h4 class="py-2">WIFI 3</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 8 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 8 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$400/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>                  
                        </div>
                    </div>  
                </div>
            </div> <!-- end of row -->
            <br>
            <div class="row gy-4" data-aos="zoom-in">
                <div class="col-lg-4">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">WIFI PLUS 1</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 10 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 10 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$450/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>
                        </div>
                    </div>  
                </div>

                <div class="col-lg-4">
                    <div class="card bg-transparent px-4">
                        <h4 class="py-2">WIFI PLUS 2</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 15 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 15 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$550/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>
                        </div>
                    </div>  
                </div>

                <div class="col-lg-4">
                    <div class="card bg-transparent px-4" >
                        <h4 class="py-2">WIFI PLUS 3</h4>
                        <p class="py-3">El precio mostrado no incluye el costo de instalacion.</p>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad descarga: 20 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Velocidad carga: 20 MEGAS</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Consumo ilimitado</p>
                        </div>
                        <div class="block d-flex align-items-center">
                            <p class="pe-2"><i class="far fa-check-circle fa-1x"></i></p>
                            <p>Soporte 24/7</p>
                        </div>
                        <h4 class="py-3">$650/Mensual</h4>
                        <div class="my-3">
                            <a class="btn" href="#contact" >Contratar</a>                  
                        </div>
                    </div>  
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of plans -->


    <!-- Work -->
    <section class="work d-flex align-items-center py-5" >
        <div class="container-fluid text-light">
        <div class="row">
                <div class="text-center w-lg-75 m-auto pb-4">
                    <h2 class="py-2">NUESTRO TRABAJO</h2>
                    <p class="para-light">Internet CICAP cuenta con las mejores soluciones para llevar internet a cualquier parte de la zona </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right">
                    <img class="img-fluid" src="img/img11.jpg" alt="work">        
                </div>
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right">
                    <img class="img-fluid" src="img/img13.jpg" alt="work">        
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of work -->


    <!-- Contact -->
    <section class="contact d-flex align-items-center py-5" id="contact">
        <div class="container-fluid text-light">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end align-items-center px-lg-5" data-aos="fade-right">
                    <div style="width:90%">
                        <div class="text-center text-lg-start py-4 pt-lg-0">
                            <p>CONTACTO</p>
                            <h2 class="py-2">Envíe su consulta</h2>
                            <p class="para-light">Para mayor información envienos un correo con sus dudas y nosotros le responderemos lo mas pronto posible.</p>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('mensajes.store') }}">
                        		{{ csrf_field() }}
                            <div>

                                <div class="row" >
                                    <div class="col-lg-6">
                                        <div class="form-group py-2">
                                            <input type="text" class="form-control form-control-input" id="nombre" value="{{ old('nombre') }}" placeholder="Ingrese su nombre">
                                            @if ($errors->has('nombre'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('nombre') }}</strong>
				                                </span>
				                            @endif
                                        </div>                                
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group py-2">
                                            <input type="email" class="form-control form-control-input" id="telefono" value="{{ old('telefono') }}"  placeholder="Introduzca número de teléfono">
                                            @if ($errors->has('telefono'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('telefono') }}</strong>
				                                </span>
				                            @endif
                                        </div>                                 
                                    </div>
                                </div>
                                <div class="form-group py-1">
                                    <input type="email" class="form-control form-control-input" id="correo" value="{{ old('nombre') }}"  placeholder="Ingrese Correo electrónico">
                                    @if ($errors->has('correo'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('correo') }}</strong>
				                                </span>
				                            @endif
                                </div>  
                                <div class="form-group py-2">
                                    <textarea class="form-control form-control-input" id="mensaje" rows="6" placeholder="Mensaje"></textarea>
                                    @if ($errors->has('mensaje'))
				                                <span class="help-block">
				                                    <strong>{{ $errors->first('mensaje') }}</strong>
				                                </span>
				                            @endif
                                </div>                            
                            </div>
                            <div class="my-3">
                                <button class="btn form-control-submit-button" type="submit">Enviar mensaje</button>
                            </div>
                        </form>
                    </div> <!-- end of div -->
                </div> <!-- end of col -->
                <div class="col-lg-6 d-flex align-items-center" data-aos="fade-down">
                    <img class="img-fluid d-none d-lg-block" src="img/img14.png" alt="contact">        
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of contact -->


    <!-- Location -->
    <section class="location text-light py-5">
        <div class="container" data-aos="zoom-in">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="p-2"><i class="far fa-map fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>DIRECCION</h6>
                        <p>Capoluca Ixtacoquitlan Veracruz</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="fas fa-mobile-alt fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>LLAME PARA CONSULTAS</h6>
                        <p>272 189 3654</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-envelope fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>ENVIANOS UN MENSAJE</h6>
                        <p>soporte@internetcicap.com.mx</p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center" >
                    <div class="p-2"><i class="far fa-clock fa-3x"></i></div>
                    <div class="ms-2">
                        <h6>HORARIO DE APERTURA</h6>
                        <p>09:00 AM - 18:00 PM</p>
                    </div>
                </div>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of location -->


    <!-- Footer -->
    <section class="footer text-light">
        <div class="container">
            <div class="row" data-aos="fade-right">
                <div class="col-lg-3 py-4 py-md-5">
                    <div class="d-flex align-items-center">
                        <h4 class="">Internet CICAP</h4>
                    </div>
                    <p class="py-3 para-light">Internet cicap cuenta con planes que se acomodan a su presupuesto y sin plazos forzosos</p>
                    <div class="d-flex">
                        <div class="me-3">
                            <a href="https://www.facebook.com/internetCICAP/">
                                <i class="fab fa-facebook-f fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="#your-link">
                                <i class="fab fa-twitter fa-2x py-2"></i>
                            </a>
                        </div>
                        <div class="me-3">
                            <a href="#your-link">
                                <i class="fab fa-instagram fa-2x py-2"></i>
                            </a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <div>
                        <h4 class="py-2">Enlaces rápidos</h4>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#about"><p class="ms-3">Acerca de</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#services"><p class="ms-3">Servicios</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#plans"><p class="ms-3">Planess</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#contact"><p class="ms-3">Contacto</p></a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <div>
                        <h4 class="py-2">Enlaces útiles</h4>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Privacidad</p></a>
                            
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#"><p class="ms-3">Términos</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#your-link"><p class="ms-3">Ayuda</p></a>
                        </div>
                        <div class="d-flex align-items-center py-2">
                            <i class="fas fa-caret-right"></i>
                            <a href="#your-link"><p class="ms-3">Preguntas frecuentes</p></a>
                        </div>
                    </div>
                </div> <!-- end of col -->

                <div class="col-lg-3 py-4 py-md-5">
                    <!--
                        <div class="d-flex align-items-center">
                        <h4>Newsletter</h4>
                    </div>
                    <p class="py-3 para-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, ab.</p>
                    <div class="d-flex align-items-center">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control p-2" placeholder="Enter Email" aria-label="Recipient's email">
                            <button class="btn-secondary text-light"><i class="fas fa-envelope fa-lg"></i></button>       
                        </div>
                    </div>
                    -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </section> <!-- end of footer -->


    <!-- Bottom -->
    <div class="bottom py-2 text-light" >
        <div class="container d-flex justify-content-between">
            <div>
                <p>Copyright © Internet CICAP</p><br>
            </div>
            <div>
                <i class="fab fa-cc-visa fa-lg p-1"></i>
                <i class="fab fa-cc-mastercard fa-lg p-1"></i>
                <i class="fab fa-cc-paypal fa-lg p-1"></i>
                <i class="fab fa-cc-amazon-pay fa-lg p-1"></i>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of bottom -->
 
    
    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="5/assets/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

    
    <!-- Scripts -->
    <script src="/5/js/bootstrap.min.js"></script><!-- Bootstrap framework -->
    <script src="/5/js/purecounter.min.js"></script> <!-- Purecounter counter for statistics numbers -->
    <script src="/5/js/swiper.min.js"></script><!-- Swiper for image and text sliders -->
    <script src="/5/js/aos.js"></script><!-- AOS on Animation Scroll -->
    <script src="/5/js/script.js"></script>  <!-- Custom scripts -->
</body>
</html>