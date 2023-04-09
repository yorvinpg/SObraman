@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-info text white">CONSULTA DE ORDENES DE TRABAJO O.T</h1>
@stop
@section('content')
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
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Encargado </label>
                            <div class="col-sm-6">
                                <form>
                                    <input type="search" class="form-control" id="enc&&" name="enc"
                                        value="{{$filtroE}}" />
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Fecha </label>
                            <div class="col-sm-6">
                                <form>
                                    <input type="text" id="fecha" name="fecha" class="form-control"
                                        value="{{$filtroF}}">
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- fin ot-encargado--fecha --}}
                    <!-- /.col -->
                    {{-- ubicacion---ttrabajo--especialidad --}}
                    <div class="col-6">
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Ubicación </label>
                            <div class="col-sm-4">
                                <form>
                                    <input type="search" class="form-control" id="ubi" name="ubi"
                                        value="{{ $filtroU }}" />
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Tipo Trabajo </label>
                            <div class="col-sm-4">
                                <form>
                                    <input type="search" class="form-control" id="enc&&" name="ttrabajo"
                                        value="{{$filtroT}}" />
                                </form>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group row">
                            <label for="fechA" class="col-md-4 col-form-label"> Especialidad </label>
                            <div class="col-sm-4">
                                <form>
                                    <input type="search" class="form-control" id="enc&&" name="esp"
                                        value="{{$filtroEp}}" />
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- ubbi--ttrabajo--especialidad --}}
                    <div class="col">
                        <div class="form-group">
                            <tr>
                                <th colspan="3">

                                    <a class="btn btn-outline-success btn-lg float-end bi bi-file-earmark-excel-fill"
                                        href="{{ route('entorno.exportExcel', [$filtro, $filtroE, $filtroU]) }}"></a>
                                </th>
                            </tr>
                        </div>
                        <br>
                        <div class="form-group">
                            <tr>
                                <th colspan="3">
                                    <a class="btn btn-outline-secondary btn-lg float-end bi bi-printer-fill"
                                        href="{{ route('entorno.exportExcel') }}"></a>
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

<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SOLICITANTE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TIPO</th>
            <th scope="col">CRITICIDAD</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($solicitudes as $item)
        <tr>
            <td>{{$item->idsolicitudOT }}</td>
            <td>{{$item->solicitante }}</td>
            <td>{{$item->email }}</td>
            <td>{{$item->t_trabajo->nom_trab }}</td>
            <td>{{$item->criticidad->tipoC }}</td>
            <td>
                <button data-toggle="modal" data-target="#Modal" class="btn btn-success"><i class="fa fa-eye"
                        aria-hidden="true"></i></button>
            </td>
            <td>
                <button class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i></button>
            </td>
            
            <form action="{{ route('solicitudot.cambiarEstado', ['id' => $item->idsolicitudOT]) }}" method="POST">
                @csrf
                @method('PUT')
                <td>
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </td>
            </form>

        </tr>
        @endforeach
    </tbody>
</table>
{{$solicitudes->links()}}
@include('entorno.modal.showm')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    flatpickr("#fecha", {
        dateFormat: "Y-m-d" // Formato de fecha
    });
</script>
@stop
