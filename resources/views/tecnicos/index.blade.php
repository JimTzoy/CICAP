@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">

                      LISTA DE ANTENAS DE LOS CLIENTES
                </div>
               
                <div class="card-body">
 
                       <a href="{{route('tecnicos.create')}}" class="btn btn-primary">Crear Tecnico</a> 
                  <div class="table-responsive" style="margin-top: 10px;">
                        <table class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Curp</th>
                                    <th>Edad</th>
                                    <th>Domicilio</th>
                                    <th>Codigo Postal</th>
                                    <th>Ciudad</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>


                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@stop
@section('javascript')
<script>
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('tecnicos.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombre', name: 'name'},
            {data: 'appaterno', name: 'appaterno'},
            {data: 'apmaterno', name: 'apmaterno'},
            {data: 'curp', name: 'curp'},
            {data: 'edad', name: 'edad'},
            {data: 'domicilio', name: 'domicilio'},
            {data: 'codigopostal', name: 'codigopostal'},
            {data: 'ciudad', name: 'ciudad'},

            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>
@stop