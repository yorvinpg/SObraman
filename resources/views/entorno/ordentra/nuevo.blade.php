@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<h1 class="text-center bg-orange text white">SOLICITUD DE ORDEN DE TRABAJO (O.T)</h1>
@stop
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="card" style="width: 59%; background: #EAECEE">
                <h5 class="card-header bg-orange"></h5>
                <div class="card-body">
                    <div class="form-group">
                        <form action="{{route('entorno.store')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="fechA" class="col-sm-4 col-form-label">Fecha de Aviso</label>
                                <div class="col-auto">
                                    <div class="input-group date" data-target-input="nearest">
                                        <input type="text" id="fecha" name="fecha" class="form-control" value="{{$date}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fechA" class="col-sm-4 col-form-label">Modulo</label>
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="modU" name="modulo" value="{{$user->modulo->abrev ?? ''}}" style="width: 225px;" readonly />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Solicitante</label>
                                <div class="col-auto">
                                    <input type="text" class="form-control" id="nameU" name="solicitante" value="{{$user->name}}" style="width: 225px;" readonly />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" style="width: 225px;" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Teléfono</label>
                                <div class="col-auto">
                                    <input type="number" class="form-control" name="telefono" id="telefono" value="{{$user->telefono}}" style="width: 225px;" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Area</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="area" aria-label="Default select example" id="area" style="width: 225px;">
                                        @foreach ($areas as $area )
                                        <option value="{{$area['idarea'] }}">{{$area['nombreA']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Responsable</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="responsable" aria-label="Default select example" id="responsable" style="width: 225px;">
                                        @foreach ($respon as $respo )
                                        <option value="{{$respo['idencargado'] }}">{{$respo['nom_E']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Tipo Trabajo</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="tt" aria-label="Default select example" id="tt" style="width: 225px;">
                                        @foreach ($tts as $tt )
                                        <option value="{{$tt['idtrabajo'] }}">{{$tt['nom_trab']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Especialidad</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="esp" aria-label="Default select example" id="esp" style="width: 225px;">
                                        @foreach ($espes as $espe )
                                        <option value="{{$espe['idespecialidad'] }}">{{$espe['nom_espe']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Criticidad</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="crit" aria-label="Default select example" id="crit" style="width: 225px;">
                                        @foreach ($crits as $crit )
                                        <option value="{{$crit['idcriticidad'] }}">{{$crit['tipoC']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Ubicación</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="ubi" aria-label="Default select example" id="ubi" style="width: 225px;">
                                        @foreach ($ubis as $ubi )
                                        <option value="{{$ubi['idubicacion'] }}">{{$ubi['nom_ubi']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Local</label>
                                <div class="col-auto">
                                    <input type="text" class="form-control" name="referencia" id="referencia" value="" style="width: 225px;" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Motivo del Reclamo</label>
                                <div class="col-auto">
                                    <textarea class="form-control" name="descripcion" id="descripcion" value="" style="width: 225px;" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Detalle</label>
                                <div class="col-auto">
                                    <textarea class="form-control" name="detalle" id="detalle" value="" style="width: 225px;" required></textarea>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning">GENERAR O.T</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align:center" id="copyright">Copyright&copy; 2023 - Página creada por Aaron Reynoso Lagos - Todos los derechos reservados de Inmobideas</div>
</section>
@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    flatpickr("#fecha", {
        dateFormat: "Y-m-d" // Formato de fecha
    });
    flatpickr("#fechaE", {
        dateFormat: "Y-m-d" // Formato de fecha
    });
</script>
<!-- <script>
    window.addEventListener("DOMContentLoaded", function() {
        var modulo = document.getElementById("modU");
        var fechaEntregaContainer = document.getElementById("fechaEntregaContainer");

        if (modulo.value !== "AT") {
            fechaEntregaContainer.style.display = "none";
        }
    });
</script> -->

@stop