@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-orange text white">CONSULTA DE ORDENES DE TRABAJO O.T</h1>
@stop
@section('content')
@if(session('success'))
<div id="success-alert" class="alert alert-success" role="success">
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
                            <label for="" class="col-md-5 col-form-label"> N° O.T </label>
                            <div class="col-sm-6">
                                <form id="search-f">
                                    <input type="search" class="form-control" id="ID" name="ID" value="{{ $filtro }}" />
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-5 col-form-label"> Responsable </label>
                            <div class="col-sm-6">
                                <form id="search-R" method="GET" action="{{ route('entorno.index') }}">
                                    <select type="search" class="form-select form-control" value="{{$filtroE}}" name="enc" aria-label="Default select example" id="resp" style="width: 175px;">
                                        <option selected>Seleccione Encargado</option>
                                        @foreach ($rr as $r )
                                        <option value="{{$r['idencargado'] }}">{{$r['nom_E']}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-5 col-form-label"> Fecha </label>
                            <div class="col-sm-6">
                                <form id="search-fh">
                                    <input type="text" id="fecha" name="fecha" class="form-control" value="{{$filtroF}}">
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- fin ot-encargado--fecha --}}
                    <!-- /.col -->
                    {{-- ubicacion---ttrabajo--estado --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Ubicación </label>
                            <div class="col-sm-4">
                                <form id="search-U" method="GET" action="{{ route('entorno.index') }}">
                                    <select type="search" class="form-select form-control" value="{{$filtroU}}" name="ubi" aria-label="Default select example" id="ubicacion" style="width: 225px;">
                                        <option selected>Seleccione una Ubicacion</option>
                                        @foreach ($UB as $u )
                                        <option value="{{$u['idubicacion'] }}">{{$u['nom_ubi']}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Area
                            </label>
                            <div class="col-sm-4">
                                <form id="search-T" method="GET" action="{{ route('entorno.index') }}">
                                    <select type="search" class="form-select form-control" value="{{$filtroA}}" name="area" aria-label="Default select example" id="area" style="width: 225px;">
                                        <option selected>Seleccione Area</option>
                                        @foreach ($AA as $A )
                                        <option value="{{$A['idarea'] }}">{{$A['nombreA']}}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Estado </label>
                            <div class="col-sm-4">
                                <form id="search-form" method="GET" action="{{ route('entorno.index') }}">
                                    <select type="search" class="form-select form-control" value="{{$filtroEs}}" name="est" aria-label="Default select example" id="estado" style="width: 225px;">
                                        <option selected>Seleccione un Estado</option>
                                        @foreach ($est as $es )
                                        @if ($es['nombrE'] !== 'anulado')
                                        <option value="{{$es['idestado']}}">{{$es['nombrE']}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- ubbi--ttrabajo--estado --}}
                    <div class="col">
                        <div class="form-group">
                            <tr>
                                <th colspan="3">

                                    <a class="btn btn-outline-success btn-lg float-end bi bi-file-earmark-excel-fill" href="{{ route('entorno.exportExcel', [$filtro, $filtroE, $filtroU]) }}"></a>
                                </th>
                            </tr>
                        </div>
                        <br>
                        <div class="form-group">
                            <tr>
                                <th colspan="3">
                                    <a class="btn btn-outline-secondary btn-lg bi bi-printer-fill" href="{{ route('entorno.imprimir') }}"></a>
                                    &nbsp;
                                </th>
                            </tr>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
</section>

@can('crear-ot')
<a class="btn btn-warning" href="{{ route('entorno.create') }}">Nuevo</a>
@endcan
<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">MODULO</th>
            <th scope="col">FECHA</th>
            <th scope="col">SOLICITANTE</th>
            <th scope="col">RESPONSABLE</th>
            <th scope="col">UBICACION</th>
            <th scope="col">REFERENCIA</th>
            <th scope="col">ESTADO</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($solicitudes as $item)
        <tr>
            <td>{{$item->modu }}</td>
            <td>{{$item->fecha->format('Y-m-d')}}</td>
            <td>{{$item->solicitante}}</td>
            <td>{{$item->encargado->nom_E }}</td>
            <td>{{$item->ubicacion->nom_ubi }}</td>
            <td>{{$item->referencia}}</td>
            <td>{{$item->estado->nombrE }}</td>
            <td>

                <button data-toggle="modal" data-target="#Modal" class="btn btn-success btn-ver-detalle" data-id="{{$item->idsolicitudOT}}" data-esp="{{$item->especialidad->nom_espe}}" data-area="{{$item->area->nombreA}}" data-det="{{$item->detalle}}" data-des="{{$item->descripcion}}" data-trabajo="{{$item->t_trabajo->nom_trab}}" data-criticidad="{{$item->criticidad->tipoC}}" data-solicitante="{{$item->solicitante}}" data-email="{{$item->email}}" data-tecnico="{{$item->tecnico->nombre_tec}}" data-spt="{{$item->detallSP}}" data-fc="{{$item->fechaCierre}}">
                    <i class="fa fa-eye" aria-hidden="true"></i></button>

            </td>
            <td>
                @can('editar-ot')
                <a href="{{route('solicitud.edit',$item->idsolicitudOT)}}" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i></a>
                <!-- <button data-toggle="modal" data-target="#ModalE" data-id="{{ $item->idsolicitudOT }}" id="edit-btn-{{ $item->idsolicitudOT }}" class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i></button> -->
                @endcan
            </td>
            <td>
                @can('anular-ot')
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $item->idsolicitudOT }}" id="delete-btn-{{ $item->idsolicitudOT }}"><i class="fa fa-trash" aria-hidden="true"></i></button>
                @endcan
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{$solicitudes->links()}}
@include('entorno.modal.showm')
@include('entorno.modal.Edit')
@include('entorno.modal.delete')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function() {
        // Escucha el evento de clic en los botones "Anular"
        $('button[id^="delete-btn-"]').on('click', function() {
            // Obtén el valor del atributo "data-id" del botón
            var id = $(this).data('id');

            // Imprime el valor en la consola del navegador
            console.log('ID del elemento: ' + id);

            // Asigna el ID al atributo "action" del formulario del modal
            $('#delete-form-modal').attr('action', '{{ route("solicitudot.cambiarEstado", ":id") }}'.replace(':id', id));
        });

        // Escucha el evento de envío del formulario del modal
        $('#delete-form-modal').on('submit', function() {
            // Obtén el valor del atributo "action" del formulario
            var action = $(this).attr('action');

            // Imprime el valor en la consola del navegador
            console.log('Valor del atributo "action": ' + action);
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Escucha el evento de clic en los botones "Anular"
        $('button[id^="edit-btn-"]').on('click', function() {
            // Obtén el valor del atributo "data-id" del botón
            var id = $(this).data('id');

            // Imprime el valor en la consola del navegador
            console.log('ID del elemento: ' + id);

            // Asigna el ID al atributo "action" del formulario del modal
            $('#edit-form-modal').attr('action', '{{ route("solicitud.update", ":id") }}'.replace(':id', id));
        });

        // Escucha el evento de envío del formulario del modal
        $('#edit-form-modal').on('submit', function() {
            // Obtén el valor del atributo "action" del formulario
            var action = $(this).attr('action');

            // Imprime el valor en la consola del navegador
            console.log('Valor del atributo "action": ' + action);
        });
    });
</script>

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
        var tecnico = $(this).data('tecnico');
        var spt = $(this).data('spt');
        var fc = $(this).data('fc');
        var fechaCierre = fc.substring(0, 10); // Recortar la cadena de fecha para eliminar la hora y los minutos
        var formattedDate = moment(fechaCierre, 'YYYY-MM-DD').format('YYYY-MM-DD');
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
        $('#modal-spt').val(spt);
        $('#modal-fc').val(formattedDate);

    });
</script>
<script>
    flatpickr("#fecha", {
        dateFormat: "Y-m-d" // Formato de fecha
    });
</script>
<script>
    //filtro automatico...... select
    function handleSelectChange(selectId, formId, currentVal) {
        $('#' + selectId).on('change', function() {
            var newVal = $(this).val();
            if (newVal !== currentVal) {
                $('#' + formId).submit();
            }
            currentVal = newVal;
        });
    }

    var currentEstado = $('#estado').val();
    handleSelectChange('estado', 'search-form', currentEstado);

    var currentU = $('#ubicacion').val();
    handleSelectChange('ubicacion', 'search-U', currentU);

    var currentT = $('#area').val();
    handleSelectChange('area', 'search-T', currentT);

    var currentR = $('#resp').val();
    handleSelectChange('resp', 'search-R', currentR);
</script>
<script>
    //filtro automatico......
    function handleInputChange(inputId, formId, currentValue) {
        var currentVal = currentValue;
        $('#' + inputId).on('change', function() {
            var newVal = $(this).val();
            if (newVal !== currentVal) {
                $('#' + formId).submit();
            }
            currentVal = newVal;
        });
    }

    handleInputChange('ID', 'search-f', $('#ID').val());
    handleInputChange('resp', 'search-r', $('#resp').val());
    handleInputChange('fecha', 'search-fh', $('#fecha').val());
</script>
<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('fast');
    }, 3000); // la alerta se ocultará después de 3 segundos (3000 milisegundos)
</script>
@stop|