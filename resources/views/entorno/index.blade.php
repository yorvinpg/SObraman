@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1 class="bg-primary text white text-center">Vista de Listado - Avisos</h1>
@stop

@section('content')
    <a href="{{route('entorno.create')}}" class="btn btn-primary">Solicitar </a>
<table class="table table-dark table-striped mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SOLICITANTE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TIPO</th>
            <th scope="col">CRITICIDAD</th>
            <th scope="col">EDITAR</th>
            <th scope="col">ANULAR</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($solicitudes as $item)
        <tr>
            <td>{{$item->idsolicitudOT }}</td>
            <td>{{$item->solicitante }}</td>
            <td>{{$item->email }}</td>
            <td>{{$item->idTipo }}</td>
            <td>{{$item->idCriti }}</td>
            <td>
                <a class="btn btn-info">Editar</a>
            </td>
            <td>
                <button class="btn btn-danger">Anular</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{$solicitudes->links()}}
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
