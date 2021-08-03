@extends('layouts.layout')

@section('content')
<style type="text/css" media="screen">
  .ACTIVO{
    background: #32D95C;
  }
  .faltapago{
    background: #F2CB05;
  }
  .SUSPENDIDO{
    background: #FF551B;
  }
  .CANCELADO{
    background: #F21628;
  }
  .REGALO{
    background: #21D7FF;
  }
</style>
<div class="container">
    <div class="row justify-content-center">
      <input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      LISTA DE CONTRATOS
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                         <div class="col-md-2 ACTIVO">
                           <p>ACTIVO</p>
                        </div>
                        <div class="col-md-3 SUSPENDIDO">
                           <p>SUSPENDIDO</p>
                        </div>
                        <div class="col-md-2 CANCELADO">
                           <p>CANCELADO</p>
                        </div>
                         <div class="col-md-3 faltapago">
                           <p>FALTA PAGO</p>
                        </div>
                        <div class="col-md-2 REGALO">
                           <p>REGALO</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{$contrato}}
               
               
    </div>
</div>
@endsection
