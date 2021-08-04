@extends('layouts.layout')

@section('content')
<style type="text/css" media="screen">
  .ingreso{
    background: #32D95C;
  }
  .egreso{
    background: #F21628;
  }
  .dddd:hover{
     -webkit-box-shadow: -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
-moz-box-shadow:    -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
box-shadow:         -5px 7px 19px 0px rgba(50, 50, 50, 0.43);
  }
.BBVA{
background: rgba(67,152,232,1);
background: -moz-linear-gradient(45deg, rgba(67,152,232,1) 0%, rgba(3,65,128,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(67,152,232,1)), color-stop(100%, rgba(3,65,128,1)));
background: -webkit-linear-gradient(45deg, rgba(67,152,232,1) 0%, rgba(3,65,128,1) 100%);
background: -o-linear-gradient(45deg, rgba(67,152,232,1) 0%, rgba(3,65,128,1) 100%);
background: -ms-linear-gradient(45deg, rgba(67,152,232,1) 0%, rgba(3,65,128,1) 100%);
background: linear-gradient(45deg, rgba(67,152,232,1) 0%, rgba(3,65,128,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4398e8', endColorstr='#034180', GradientType=1 );
}
.AZTECA{
  background: rgba(27,224,34,1);
background: -moz-linear-gradient(45deg, rgba(27,224,34,1) 0%, rgba(15,163,2,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(27,224,34,1)), color-stop(100%, rgba(15,163,2,1)));
background: -webkit-linear-gradient(45deg, rgba(27,224,34,1) 0%, rgba(15,163,2,1) 100%);
background: -o-linear-gradient(45deg, rgba(27,224,34,1) 0%, rgba(15,163,2,1) 100%);
background: -ms-linear-gradient(45deg, rgba(27,224,34,1) 0%, rgba(15,163,2,1) 100%);
background: linear-gradient(45deg, rgba(27,224,34,1) 0%, rgba(15,163,2,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1be022', endColorstr='#0fa302', GradientType=1 );
}
.BANCOPPEL{
  background: rgba(255,227,117,1);
background: -moz-linear-gradient(45deg, rgba(255,227,117,1) 0%, rgba(230,208,7,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(255,227,117,1)), color-stop(100%, rgba(230,208,7,1)));
background: -webkit-linear-gradient(45deg, rgba(255,227,117,1) 0%, rgba(230,208,7,1) 100%);
background: -o-linear-gradient(45deg, rgba(255,227,117,1) 0%, rgba(230,208,7,1) 100%);
background: -ms-linear-gradient(45deg, rgba(255,227,117,1) 0%, rgba(230,208,7,1) 100%);
background: linear-gradient(45deg, rgba(255,227,117,1) 0%, rgba(230,208,7,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffe375', endColorstr='#e6d007', GradientType=1 );

}
.TEHUIPANGO{
  background: rgba(255,152,115,1);
background: -moz-linear-gradient(45deg, rgba(255,152,115,1) 0%, rgba(227,3,3,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(255,152,115,1)), color-stop(100%, rgba(227,3,3,1)));
background: -webkit-linear-gradient(45deg, rgba(255,152,115,1) 0%, rgba(227,3,3,1) 100%);
background: -o-linear-gradient(45deg, rgba(255,152,115,1) 0%, rgba(227,3,3,1) 100%);
background: -ms-linear-gradient(45deg, rgba(255,152,115,1) 0%, rgba(227,3,3,1) 100%);
background: linear-gradient(45deg, rgba(255,152,115,1) 0%, rgba(227,3,3,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff9873', endColorstr='#e30303', GradientType=1 );
}
.EFECTIVO{
  background: rgba(147,206,222,1);
background: -moz-linear-gradient(45deg, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(147,206,222,1)), color-stop(41%, rgba(117,189,209,1)), color-stop(100%, rgba(73,165,191,1)));
background: -webkit-linear-gradient(45deg, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -o-linear-gradient(45deg, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: -ms-linear-gradient(45deg, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
background: linear-gradient(45deg, rgba(147,206,222,1) 0%, rgba(117,189,209,1) 41%, rgba(73,165,191,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cede', endColorstr='#49a5bf', GradientType=1 );
}
.CIBERCICAP{
  background: rgba(245,144,223,1);
background: -moz-linear-gradient(45deg, rgba(245,144,223,1) 0%, rgba(224,16,155,1) 100%);
background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(245,144,223,1)), color-stop(100%, rgba(224,16,155,1)));
background: -webkit-linear-gradient(45deg, rgba(245,144,223,1) 0%, rgba(224,16,155,1) 100%);
background: -o-linear-gradient(45deg, rgba(245,144,223,1) 0%, rgba(224,16,155,1) 100%);
background: -ms-linear-gradient(45deg, rgba(245,144,223,1) 0%, rgba(224,16,155,1) 100%);
background: linear-gradient(45deg, rgba(245,144,223,1) 0%, rgba(224,16,155,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f590df', endColorstr='#e0109b', GradientType=1 );
}
</style>
<div class="container-fluid">
    <div class="row justify-content-center">
      <input type="hidden" value="{{ $date = \Carbon\Carbon::now()}}">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-9">
                      BANCOS REGISTRADOS
                    </div>
                    <div class="col-md-3">
                      <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></span>

                        <div class="info-box-content">
                        <span class="info-box-text">Capital</span>
                          <span class="info-box-number"><h3><?php echo number_format($capital, 2, '.', '');?></h3></span>
                        </div>
                        <!-- /.info-box-content -->
                        </div>
                    </div>
                  </div>
                </div>
               
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                       <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                          Registrar BANCO
                      </button>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                      <?php foreach ($banco as $c) {
                      ?>
                          <div class="col-md-3">

                              <div class="card <?php echo $c->nbanco; ?>">
                                  <div class="card-header" style="text-align: center;">
                                      <h5>BANCO <?php echo $c->nbanco; ?></h5>
                                  </div>
                                  <div class="card-body" style="text-align:center;">
                                     <h1>$ <?php echo number_format($c->cantidad, 2, '.', '');?></h1>
                                     <h4><?php echo $c->updated_at; ?></h4>
                                  </div>
                                  <div class="card-footer">
                                      <a href="{{action('BancoController@show', $c->id)}}" class="btn btn-primary">DETALLES</a>
                                      <a href="{{route('ingresos.index')}}" class="btn btn-info">REGISTRAR</a>
                                  </div>
                                  
                              </div>
                          </div>

                      <?php } ?>
              </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"  style="text-align: center;">REGISTRAR BANCO</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
            <form class="form-horizontal" method="POST" action="{{ route('bancos.store') }}" accept-charset="utf-8">
            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nbanco') ? ' has-error' : '' }}">
                            <label for="nbanco" class="col-md-12 control-label">Nombre Banco</label>

                            <div class="col-md-12">
                                <input id="nbanco" type="text" class="form-control" name="nbanco" value="{{ old('nbanco') }}" required autofocus>

                                @if ($errors->has('nbanco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nbanco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('cantidad') ? ' has-error' : '' }}">
                            <label for="cantidad" class="col-md-12 control-label">Capital</label>

                            <div class="col-md-12">
                                <input id="cantidad" type="text" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>

                                @if ($errors->has('cantidad'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cantidad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <button type="submit" class="btn btn-primary">Registrar</button>
              </form>
      </div>
    </div>
  </div>
</div>
@endsection