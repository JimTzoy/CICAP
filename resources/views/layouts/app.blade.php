<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CICAP</title>

 <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
    <style type="text/css" media="screen">
        .colornav{
          background: rgba(204,22,83,1);
background: -moz-linear-gradient(left, rgba(204,22,83,1) 0%, rgba(166,3,63,1) 99%, rgba(166,3,63,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(204,22,83,1)), color-stop(99%, rgba(166,3,63,1)), color-stop(100%, rgba(166,3,63,1)));
background: -webkit-linear-gradient(left, rgba(204,22,83,1) 0%, rgba(166,3,63,1) 99%, rgba(166,3,63,1) 100%);
background: -o-linear-gradient(left, rgba(204,22,83,1) 0%, rgba(166,3,63,1) 99%, rgba(166,3,63,1) 100%);
background: -ms-linear-gradient(left, rgba(204,22,83,1) 0%, rgba(166,3,63,1) 99%, rgba(166,3,63,1) 100%);
background: linear-gradient(to right, rgba(204,22,83,1) 0%, rgba(166,3,63,1) 99%, rgba(166,3,63,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cc1653', endColorstr='#a6033f', GradientType=1 );
        }

    </style>
    <div id="app">
        <nav class="navbar navbar-expand-md colornav fixed-top">
            <div class="container">
                <a style="color: #fff; font-size: 2em;" class="navbar-brand" href="{{ url('/') }}">
                    Internet CICAP                </a>
                <button style="color: #fff; font-size: 0.9em;" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span style="color: #fff;" class="fas fa-bars"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="color: #fff; font-size: 1.5em;">
                        <!-- Authentication Links -->
                        @guest
                            <style type="text/css" media="screen">
                                .nav-item:hover{
                                    background: #023E73;
                                }
                            </style>
                            <li class="nav-item">
                                <a class="nav-link" style="color: #fff; font-size: 0.7em;" href="{{ route('login') }}"><span class="fas fa-sign-in-alt"> </span> Iniciar sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #fff; font-size: 0.7em;"><span class="fas fa-user"> </span> Registrarte</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" style="color: #fff; font-size: 0.7em;" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        <span class="fas fa-tachometer-alt"> </span> Desboard
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span class="fas fa-sign-out-alt"> </span> 
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    <!-- Main content -->
    <section class="content" style="background: #D9D9D9;">
      <div class="container-fluid">
        @yield('content')
      </div>
    </section>
    </div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
