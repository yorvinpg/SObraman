@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-info text white">ORDENES DE TRABAJO ANULADOS</h1>
@stop

@section('content')
@if(session('success'))
<div  id="success-alert"  class="alert alert-danger" role="success">
    {{session('success')}}
</div>
@endif
<section class="content">
    <div class="container-fluid" style="background: #adadad10">
        <div class="card card-default" style="background: #EAECEE">
            {{--
            <!-- menos --> --}}
            <div class="card-header">
                <a>BUSQUEDA <i class="bi bi-search"></i></a>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="text-center card-body">
                <div class="row">
                    {{-- ot---encargado---fecha --}}
                    <div class="col-sm-4">
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label"> N° O.T </label>
                            <div class="col-sm-6">
                                <form>
                                    <input type="search" class="form-control" id="ID" name="ID" value="{{ $filtro }}" />
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- fin ot-encargado--fecha --}}
                </div>
                <!-- /.row -->
            </div>
        </div>
</section>
<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">OT</th>
            <th scope="col">FECHA</th>
            <th scope="col">RESPONSABLE</th>
            <th scope="col">UBICACION</th>
            <th scope="col">ESTADO</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($anu as $item)
        <tr>
            <td>{{$item->idsolicitudOT }}</td>
            <td>{{$item->fecha->format('Y-m-d')}}</td>
            <td>{{$item->encargado->nom_E }}</td>
            <td>{{$item->ubicacion->nom_ubi }}</td>
            <td>{{$item->estado->nombrE }}</td>
            <td>
                <button data-toggle="modal" data-target="#Modal" class="btn btn-success btn-ver-detalle"
                    data-id="{{$item->idsolicitudOT}}" data-esp="{{$item->especialidad->nom_espe}}"
                    data-area="{{$item->area->nombreA}}" data-det="{{$item->detalle}}" data-des="{{$item->descripcion}}"
                    data-trabajo="{{$item->t_trabajo->nom_trab}}" data-criticidad="{{$item->criticidad->tipoC}}"
                    data-solicitante="{{$item->solicitante}}" data-email="{{$item->email}}">
                    <i class="fa fa-eye" aria-hidden="true"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$anu->links()}}
@include('entorno.modal.showm')
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    //script modal view detalles.
    $('.btn-ver-detalle').on('click', function() {
        var id = $(this).data('id');
        var fecha = $(this).closest('tr').find('td:eq(1)').text();
        var resp = $(this).closest('tr').find('td:eq(2)').text();
        var ubicacion = $(this).closest('tr').find('td:eq(3)').text();
        var est = $(this).closest('tr').find('td:eq(4)').text();
        var esp = $(this).data('esp');
        var area = $(this).data('area');
        var det = $(this).data('det');
        var des = $(this).data('des');
        var trabajo = $(this).data('trabajo');
        var criticidad = $(this).data('criticidad');
        var solicitante = $(this).data('solicitante');
        var email = $(this).data('email');


       // Asignar los datos obtenidos a los campos del modal
       $('#modal-id').val(id);
       $('#modal-fecha').val(fecha);
       $('#modal-resp').val(resp);
       $('#modal-ubicacion').val(ubicacion);
       $('#modal-estado').val(est);
       $('#modal-especialidad').val(esp);
       $('#modal-area').val(area);
       $('#modal-detalle').val(det);
       $('#modal-descripcion').val(des);
       $('#modal-trabajo').val(trabajo);
       $('#modal-criticidad').val(criticidad);
       $('#modal-solicitante').val(solicitante);
       $('#modal-email').val(email);
       $('#modal-tecnico').val(tecnico);

    });
</script>
<script>
    console.log('Hi!');
</script>
<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('fast');
    }, 3000); // la alerta se ocultará después de 3 segundos (3000 milisegundos)
</script>
@stop
