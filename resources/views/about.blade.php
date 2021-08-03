@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Bungee+Outline&display=swap" rel="stylesheet">
<style type="text/css" media="screen">
  
.contenido{
    background: #ffffff;
}
.cont{
    width: 90%;
    color: rgb(41, 50, 58);
    text-align: left;
    font-family: Arial, Helvetica, sans-serif;
 
    padding: 20px 20px;
}
.conte{
    text-align: center;
    float: left;
    font-size: 1.3em;
    padding: 20px 20px 20px 20px;
}
.img-app{
    height: 400px;
    margin-left: 20px;
    margin-right: 20px;
    -webkit-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.75);
box-shadow: 0px 9px 24px 0px rgba(0,0,0,0.75);
}
.descargar {
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
    background: #4CAF50;
  }
  .leermas {
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 16px;
    cursor: pointer;
    background: #E50914;
  }
h1{
    font-size: 48px;
    color: rgb(7, 129, 243);
    font-family: 'Imprint MT Shadow';
}

header {
    width: 100%;
    height: 500px;
    background-image: url(/img/img6.png);
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    position: relative;
    overflow: hidden;
    color: rgb(5, 5, 5);
    text-align: center;
}
.headerrr {
    width: 100%;
    height: 800px;
    background-image: url(/img/img6.png);
    background-attachment: fixed;
    background-position: center;
    background-size: cover;
    position: relative;
    overflow: hidden;
    color: rgb(5, 5, 5);
    text-align: center;
}

header .textos {
    margin-top: 152px;
}

header .titulo {
    font-size: 85px;
}

header .subtitulo {
    font-size: 42px;
    font-weight: 300;
    margin-bottom: 32px;
}

header .boton {
    width: 200px;
    display: inline-block;
    padding: 10px 10px 10px 10px;
    border: 1px solid #fff;
    color:black;
    font-size: 19px;
    text-align: center;
    text-decoration: none;
    border-radius: 16px;
}

.sesgoabajo {
    z-index: 10;
    position: absolute;
    bottom: 0;
    left: 0;
    border-width: 0 0 30vh 100vw;
    border-style: solid;
    border-color: transparent transparent #fff transparent;
}

.sesgoarriba {
    z-index: 10;
    position: absolute;
    top: 0;
    left: 0;
    border-width: 30vh 100vw 0 0;
    border-style: solid;
    border-color: #fff transparent transparent transparent;
}

.contenedor {
    width: 100%;
    margin: auto;
    overflow: hidden;
    padding: 20px 20px 20px 20px;
}

/* Main */

.sobre-nosotros {
    text-align: center;
    font-size: 56px;
    margin-bottom: 10px;
    font-weight: 600;
}

.slogan {
    font-size: 24px;
    font-weight: 300;
    text-align: center;
    margin-bottom: 24px;
}

.parrafo {
    margin-bottom: 13px;
    font-weight: 300;
    text-align: justify;
    line-height: 24px;
    color: rgb(24, 16, 16);
}

.acerca-de .boton {
    display: inline-block;
    padding: 6px;
    width: 128px;
    font-weight: 300;
    border: 1px solid rgba(24, 16, 16, .7);
    color: rgb(24, 16, 16);
    font-size: 16px;
    text-align: center;
    text-decoration: none;
    border-radius: 16px;
    margin-top: 24px;
}

.galeria {
    width: 100%;
    height: 500px;
    overflow: hidden;
    display: flex;
    position: relative;
    flex-wrap: wrap;
}

.imagenes {
    width: 20%;
    height: 400px;
    overflow: hidden;
    position: relative;
}

.imagenes img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.encima {
    position: absolute;
    color: black;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(52, 73, 94, 0.815);
}

.encima h2 {
    position: relative;
    top: 45%;
    text-align: center;
    color:black;
}

.encima div {
    position: relative;
    display: block;
    top: 46%;
    width: 40px;
    height: 5px;
    background: black;
    margin: auto;
}

.cards {
    width: 100%;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.cardss{
    margin: 20px 0;
    width: 33%;
    height: 200px;
    text-align: center;
    padding: 20px 20px;
    background: #a6033f;
    box-shadow: 0px 0px 4px 0 rgba(52, 73, 94, 0.849);
}
.cardss:hover{
  background: #033E8C;
}

.cards img {
    width: 100%;
    object-fit: cover;
}


.fondo {
    height: 900px;
    position: relative;
    background-image: url(/img/imagen8.png);
    overflow: hidden;
    background-attachment: fixed;
    background-position: center;
    padding-top: 130px;
}

.sesgoabajo-unico {
    z-index: 10;
    position: absolute;
    bottom: 0;
    left: 0;
    border-width: 0 0 35vh 100vw;
    border-style: solid;
    border-color: transparent transparent #2c3e50 transparent;
}

.titulo-patrocinadores,
.subtitulo-patrocinadores {
    color: black;
    text-align: center;
}

.titulo-patrocinadores {
    font-size: 56px;
    margin-top: 48px;
}

.subtitulo-patrocinadores {
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 64px;
}

.clientes {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 64px;
    width: 100%;
    justify-content: space-between;
}

.cliente {
    width: 30%;
}

.cliente img {
    width: 100%;
}

/* Footer */

footer {
    background: #2c3e50;
    height: auto;
}

.titulo-footer,
.subtitulo-footer {
    color: black;
    text-align: center;
    font-weight: 400;
    font-size: 56px;
}

.subtitulo-footer {
    font-size: 16px;
    margin-bottom: 64px;
}

form {
    display: flex;
    width: 100%;
    justify-content: space-between;
    flex-wrap: wrap;
    margin: auto;
}

input[type="text"],
input[type="email"] {
    display: inline-block;
    width: 48%;
    padding: 13px;
    border: none;
    color: #fff;
    font-family: 'open sans';
    background: rgba(37, 37, 33, .7);
    margin-bottom: 16px;
    border-top: 5px solid rgba(37, 37, 33, .7);
}

input[type="text"]:focus,
input[type="email"]:focus,
textarea:focus {
    border-top: 5px solid rgba(255, 255, 255, 0.7);
}

textarea {
    display: block;
    width: 100%;
    max-width: 100%;
    min-width: 100%;
    max-height: 200px;
    min-height: 200px;
    background: rgba(37, 37, 33, .7);
    padding: 13px;
    border: none;
    color: black;
    font-family: 'open sans';
    margin-bottom: 16px;
}

input[type="submit"] {
    display: inline-block;
    padding: 13px;
    border: none;
    color:black;
    background: rgba(37, 37, 33, .7);
    width: 96px;
}

/* Responsive */

@media screen and (max-width:900px) {
    .card {
        width: 48%;
    }
}

@media screen and (max-width:610px) {
    header .textos {
        margin-top: 130px;
    }

    header .titulo {
        font-size: 75px;
    }

    .none {
        display: none
    }

    .imagenes {
        flex-grow: 1;
    }

    .card {
        width: 90%;
    }

    .fondo {
        height: auto;
    }

    .especial {
        display: none;
    }

    .cliente {
        width: 90%;
        height: 200px;
        margin-bottom: 50px;
    }
}

@media screen and (max-width:380px) {
    header .textos {
        margin-top: 100px;
    }

    header .titulo {
        font-size: 65px;
    }

    header .subtitulo {
        font-size: 25px;
        margin-bottom: 32px;
    }

    .sobre-nosotros {
        font-size: 46px;
    }

    .slogan {
        font-size: 20px;
    }

    .titulo-patrocinadores {
        font-size: 46px;
    }

    .subtitulo-patrocinadores {
        font-size: 20px;
    }
}
</style>
 <header>
        <div class="textos">
            <h1 class="titulo">INTERNET CICAP</h1>
            <h3 class="subtitulo">Empresa de servicios de internet</h3>
            <a href="/contacto" class="boton">CONTACTO</a>
        </div>
    </header>
    <main>
        <section class="acerca-de">
            <div class="contenedor">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="conte">
                        <img src="/img/Cicap.png" class="img-app" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="cont">
                            <h1 class="sobre-nosotros">MISIÓN</h1>
                        <p class="parrafo">Internet cicap es una empresa dedicada a ofrecer el servicio de internet a las zonas alejadas de ixtczoquitlan </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="galeria">

            <div class="imagenes none">
                <img src="/img/img1.png" alt="">
            </div>
            <div class="imagenes">
                <img src="/img/img2.png" alt="">
            </div>
            <div class="imagenes">
                <img src="/img/img6.png" alt="">

            </div>
            <div class="imagenes">
                <img src="/img/img4.png" alt="">

            </div>
            <div class="imagenes none">
                <img src="/img/img7.png" alt="">
            </div>
        </section>
        <section class="acerca-de">
            <div class="contenedor">
                <div class="row">
                    <div class="col-sm-8 col-md-8">
                        <div class="cont">
                            <h1 class="sobre-nosotros">VISIÓN</h1>
                        <p class="parrafo">Ser una empresa con presecia en diferentes comunidades de ixtaczoquitlan asi</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 ">
                        <div class="conte">
                            <img src="/img/Cicap.png" class="img-app" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="acerca-de">
            <div class="contenedor">
                <div class="row">
                <div class="col-sm-4 col-md-4 ">
                        <div class="conte">
                            <img src="/img/Cicap.png" class="img-app" style="width: 100%;">
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-8">
                        <div class="cont">
                            <h1 class="sobre-nosotros">Valores</h1>
                        <p class="parrafo"><span style="font-size:30px;color:#000000;">Registrate.</span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minima libero veniam harum nobis culpa autem repellendus doloribus! Qui nulla necessitatibus veritatis modi praesentium expedita asperiores rem ipsum, eius fuga doloremque.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <header class="headerrr">
        <section class="fondo">
            <div class="contenedor">
                <h2 class="sobre-nosotros" style="color: #000;">COMUNIDADES</h2>
                <h3 class="slogan">Conoce las comunidades con las que contamos el servicio</h3>
                <div class="cards">
                    <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 3.4em; font-family: 'Bungee Outline', cursive;color: #ffff;">CAPOLUCA</h4>
                    </div>
                    <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 2.8em; font-family: 'Bungee Outline', cursive;color: #ffff;">TUXPANGUILLO</h4>
                    </div>
                    <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 3.5em; font-family: 'Bungee Outline', cursive;color: #ffff;">CAMPO GRANDE</h4>
                    </div>
                </div> 
                <div class="cards">
                     <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 3.2em; font-family: 'Bungee Outline', cursive;color: #ffff;">RINCON MARAVILLAS</h4>
                    </div>
                     <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 3.4em; font-family: 'Bungee Outline', cursive;color: #ffff;">CUMBRE DE TUXPANGO</h4>
                    </div>
                     <div class="cardss" style="text-align: center;">
                        <h4 style="font-size: 3.4em; font-family: 'Bungee Outline', cursive;color: #ffff;">CAMPO CHICO</h4>
                    </div>
                </div>
            </div>
            
        </section>
        </header>

        <section class="miembros">
            <div class="contenedor">
                <div class="container" style="text-align:center;">
                    <h1>COMENTARIOS</h1>
                    <div class="row">
                        <div class="col-md-3" style="padding: 20px 20px 20px 20px;">
                            <div class="card" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">
                                <img src="/img/Cicap.png" alt="" style="border-radius: 50%; display: block;margin-left: auto; margin-right: auto;width: 50%;">
                                <p><strong>Hector Samuel</strong></p>
                                <p>El servicio de internet es excelente contrate 5 Megas y esta funcionando bien. Ademas el servicio al cliente es de maravilla</p>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding: 20px 20px 20px 20px;">
                            <div class="card" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">
                                <img src="/img/Cicap.png" alt="" style="border-radius: 50%; display: block;margin-left: auto; margin-right: auto;width: 50%;">
                                <p><strong>Hector Samuel</strong></p>
                                <p>El servicio de internet es excelente contrate 5 Megas y esta funcionando bien. Ademas el servicio al cliente es de maravilla</p>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding: 20px 20px 20px 20px;">
                            <div class="card" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">
                                <img src="/img/Cicap.png" alt="" style="border-radius: 50%; display: block;margin-left: auto; margin-right: auto;width: 50%;">
                                <p><strong>Hector Samuel</strong></p>
                                <p>El servicio de internet es excelente contrate 5 Megas y esta funcionando bien. Ademas el servicio al cliente es de maravilla</p>
                            </div>
                        </div>
                        <div class="col-md-3" style="padding: 20px 20px 20px 20px;">
                            <div class="card" style="text-align: center;font-family: Arial, Helvetica, sans-serif;">
                                <img src="/img/Cicap.png" alt="" style="border-radius: 50%; display: block;margin-left: auto; margin-right: auto;width: 50%;">
                                <p><strong>Hector Samuel</strong></p>
                                <p>El servicio de internet es excelente contrate 5 Megas y esta funcionando bien. Ademas el servicio al cliente es de maravilla</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
    </main>

@endsection