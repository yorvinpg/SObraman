@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<h1 class="text-center bg-info text white">LISTA DE USUARIOS</h1>

@stop
@section('content')
@can('crear-user')
<a class="btn btn-warning" href="{{ route('usuario.create') }}">Nuevo</a>
@endcan
<table class="table mt-4 table-bordered">
    <thead class="table-info">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">USUARIO</th>
            <th scope="col">ROL</th>
            <th scopre="col">ACCIONES</th>
        </tr>
    </thead>
    <tbody class="table-dark">
        @foreach ($users as $usuario)
        <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->username}}</td>
            <td>
                @if(!empty($usuario->getRoleNames()))
                @foreach($usuario->getRoleNames() as $rolNombre)
                <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                @endforeach
                @endif
            </td>
            <td>
                @can('editar-user')
                <a class="btn btn-info" href="{{ route('usuario.edit',$usuario->id) }}">Editar</a>
                @endcan
                @can('anular-user')
                {!! Form::open(['method' => 'DELETE','route' => ['usuario.destroy', $usuario->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
                @endcan
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