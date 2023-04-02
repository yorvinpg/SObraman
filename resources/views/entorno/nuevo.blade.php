@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="js/bootstrap-datetimepicker.min.js"></script>
<h1 class="text-center bg-primary text white">SOLICITUD DE ORDEN DE TRABAJO (O.T)</h1>
@stop

@section('content')
<div class="card">
    <h5 class="card-header bg-dark"></h5>
    <div class="card-body">
        <form action="{{route('entorno.store')}}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="fechA" class="col-sm-2 col-form-label">Fecha de Aviso</label>
                <div class="col-sm-6">
                    <div class="input-group date"  data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" value="{{$date}}"
                            data-target="#datepicker" id="fecha" name="fecha"/>
                        <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Solicitante</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="nameU" name="solicitante" value="{{$user->name}}" />
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" id="email" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="telefono" id="telefono" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-6">
                    <select class="form-select form-control" name="area" aria-label="Default select example" id="area">
                        @foreach ($areas as $area )
                        <option value="{{$area['idarea'] }}">{{$area['nombreA']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Trabajo</label>
                <div class="col-sm-6">
                    <select class="form-select form-control" name="tt" aria-label="Default select example" id="tt">
                        @foreach ($tts as $tt )
                        <option value="{{$tt['idtrabajo'] }}">{{$tt['nom_trab']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Especialidad</label>
                <div class="col-sm-6">
                    <select class="form-select form-control" name="esp" aria-label="Default select example" id="esp">
                        @foreach ($espes as $espe )
                        <option value="{{$espe['idespecialidad'] }}">{{$espe['nom_espe']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Criticidad</label>
                <div class="col-sm-6">
                    <select class="form-select form-control" name="crit" aria-label="Default select example" id="crit">
                        @foreach ($crits as $crit )
                        <option value="{{$crit['idcriticidad'] }}">{{$crit['tipoC']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Ubicación</label>
                <div class="col-sm-6">
                    <select class="form-select form-control" name="ubi" aria-label="Default select example" id="ubi">
                        @foreach ($ubis as $ubi )
                        <option value="{{$ubi['idubicacion'] }}">{{$ubi['nom_ubi']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Referencia</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="referencia" id="referencia" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="descripcion" id="descripcion" value=""> </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Detalle</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="detalle" id="detalle" value=""> </textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">GENERAR O.T</button>
        </form>
    </div>
</div>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
