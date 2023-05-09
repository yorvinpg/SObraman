@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-info text white">LISTA DE USUARIOS</h1>

<div class="card-header">
    <form>
        <input  class="form-control" placeholder="Ingrese Usuario" />
    </form>

</div>

@stop
@section('content')

<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">USUARIO</th>
            <th scope="col">ROL</th>
        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($users as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td>
                <a class="btn btn-primary" >Rol</a>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
{{$users->links()}}

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
