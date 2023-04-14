@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-info text white">ORDENES DE TRABAJO ANULADOS</h1>
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
            <th scope="col">ID</th>
            <th scope="col">SOLICITANTE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TIPO</th>
            <th scope="col">CRITICIDAD</th>
            <th scope="col"></th>

        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($anu as $item)
        <tr>
            <td>{{$item->idsolicitudOT }}</td>
            <td>{{$item->solicitante }}</td>
            <td>{{$item->email }}</td>
            <td>{{$item->t_trabajo->nom_trab }}</td>
            <td>{{$item->criticidad->tipoC }}</td>
            <td>
                <button data-toggle="modal" data-target="#Modal" class="btn btn-success btn-ver-detalle"
                    data-id="{{$item->idsolicitudOT}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$anu->links()}}
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
