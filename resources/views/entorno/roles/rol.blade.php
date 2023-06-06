@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-orange ">LISTA DE ROLES</h1>

@stop
@section('content')
@can('crear-rol')
<a class="btn btn-warning" href="{{ route('roles.create') }}">Nuevo</a>
@endcan
<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                @can('editar-rol')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Editar</a>
                @endcan

                @can('anular-rol')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop