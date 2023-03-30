@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h1 class="text-center bg-primary text white">SOLICITUD DE ORDEN DE TRABAJO (O.T)</h1>
@stop

@section('content')
<div class="card">
    <h5 class="card-header bg-dark"></h5>
    <div class="card-body">
        <div class="container">
            <form>
                <div class="form-group row">
                    <label for="fechA" class="col-sm-2 col-form-label">Fecha de Aviso</label>
                    <div class="col-sm-6">
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input"
                                data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Solicitante</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="solic" placeholder="Yorvin Palacios" disabled="true">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="staticEmail" value="email@example.com">
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="staticEmail" value="+51 9594392394">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Area</label>
            <div class="col-sm-6">
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Elija Responsable</option>
                    <option value="1">Miguel Rubio</option>
                    <option value="2">Javier Mattos</option>
                    <option value="3">Raul</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Tipo Trabajo</label>
            <div class="col-sm-6">
                <select class="form-select form-control" aria-label="Default select example">
                    <option value="1">Mantenimiento Correctivo</option>
                    <option value="2">Mantenimiento Preventivo</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Especialidad</label>
            <div class="col-sm-6">
                <select class="form-select form-control" aria-label="Default select example">
                    <option value="1">Albañileria</option>
                    <option value="2">Ascensor</option>
                    <option value="3">Raul</option>
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Criticidad</label>
            <div class="col-sm-6">
                <select class="form-select form-control" aria-label="Default select example">
                    <option value="1">Baja</option>
                    <option value="2">Normal</option>
                    <option value="3">Prioritario</option>
                    <option value="4">Urgente</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Ubicación</label>
            <div class="col-sm-6">
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected>Elija Ubicación</option>
                    <option value="1">Miguel Rubio</option>
                    <option value="2">Javier Mattos</option>
                    <option value="3">Raul</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Referencia</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="staticEmail" value="Ingrese Referencia">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="staticEmail" value=""> </textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Detalle</label>
            <div class="col-sm-6">
                <textarea class="form-control" id="staticEmail" value=""> </textarea>
            </div>
        </div>
        </form>
    </div>
    <div class="text-center">
        <a href="#" class="btn btn-primary">GENERAR O.T</a>
    </div>
</div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
