@extends('layouts.layout')

@section('content')
<div class="container">
   
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">        
                    <!-- Info boxes -->
                    <div class="row">
                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                          <span class="info-box-icon bg-info elevation-1"><i class="fa fa-university"></i></span>

                          <div class="info-box-content">
                            <a href="{{route('bancos.index')}}">
                              <span class="info-box-text">Bancos</span>
                              <span class="info-box-number">
                                <small>#</small>
                                4 
                              </span>
                            </a>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->

                      <!-- fix for small devices only -->
                      <div class="clearfix hidden-md-up"></div>

                      <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                          <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                      <div class="col-12 col-sm-6 col-md-3" >
                        <div class="info-box mb-3">
                          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-bar"></i></span>

                          <div class="info-box-content">
                            <a href="{{route('ingresos.index')}}">
                            <span class="info-box-text">Resumen hoy</span>
                            <span class="info-box-number">$ <?php echo number_format($pagos, 2, '.', '');?></span>
                            </a>
                          </div>
                          <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->hasRole('admin'))
                        <div class="row">

                            <?php foreach ($contrato as $c) {
                            ?>
                                <div class="col-md-4">
                                     <style type="text/css">
                                        .contenido{
                                              border-style: solid;
                                            border-color: #C9182E;
                                            border-width: 2px;
                                        }
                                        .contenido:hover{
                                            -webkit-box-shadow: 2px 2px 21px 2px rgba(201,24,46,0.66); 
box-shadow: 2px 2px 21px 2px rgba(201,24,46,0.66);
                                        }
                                    </style>
                                    <div class="card contenido">
                                        <div class="card-header" style="text-align: center;">
                                            <h4>FALTA PAGO</h4>
                                        </div>
                                        <div class="card-body">
                                            <p><strong>Fecha:  </strong><?php echo date('d-m-Y', strtotime($c->fechainicio));?>--<?php echo date('d-m-Y', strtotime($c->fechafin));?></p>
                                            <p><strong>Nombre: </strong> <?php echo $c->nombrecompleto; ?></p>
                                            <p><strong>Plan: </strong><?php echo $c->plan_id; ?></p>
                                            <p><strong>Cantidad: </strong><?php echo $c->precio;?></p>
                                            <p><strong>Dirección: </strong><?php echo $c->domicilio; ?></p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{action('ContratosController@show', $c->id)}}" class="btn btn-primary">VER</a>
                                            <a href="{{route('index', $c->id)}}" class="btn btn-info">PAGAR</a>
                                        </div>
                                        
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    @else
                        <div>Acceso usuario</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
