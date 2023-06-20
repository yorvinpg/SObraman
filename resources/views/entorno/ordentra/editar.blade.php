@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<h1 class="text-center bg-orange text white">Reporte Tecnico O.T</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="card" style="width: 59%; background: #EAECEE">
                <h5 class="card-header bg-orange"></h5>
                <div class="card-body">
                    <form action="{{ route('solicitud.update', $id->idsolicitudOT) }}" method="post" id="myForm">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="estado" aria-label="Default select example" id="estado" style="width: 225px;">
                                        @foreach ($est as $es )
                                        @if ($es['nombrE'] !== 'anulado')
                                        <option value="{{$es['idestado']}}">{{$es['nombrE']}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div id="fecha-wrapper" style="display: none;">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Fecha Cierre</label>
                                    <div class="col-auto">
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" id="fecha" name="fecha" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" id="fechaEntregaContainer">
                                <div class="form-group row">
                                    <label for="fechE" class="col-sm-4 col-form-label">Fecha Entrega</label>
                                    <div class="col-auto">
                                        <div class="input-group date" data-target-input="nearest">
                                            <input type="text" id="fechaE" name="fechaE" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Tecnico</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="tecnico" aria-label="Default select example" id="tecnico" style="width: 225px;">
                                        @foreach ($tec as $t )
                                        <option value="{{$t['idtecnico'] }}">{{$t['nombre_tec']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Detalle de la Solución</label>
                                <textarea class="form-control" id="detalle" value="{{ old('detallSP', $id->detallSP) }}" name="detalle" required></textarea>
                            </div>
                            <div class="form-floating">
                                <label for="floatingTextarea">Observación Final</label>
                                <textarea class="form-control" id="observacion" value="{{$id->obsFinal}}" name="observacion" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
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
<script>
    var estadoSelect = document.getElementById("estado");
    var fechaWrapper = document.getElementById("fecha-wrapper");
    var fechaEntregaContainer = document.getElementById("fechaEntregaContainer");
    var form = document.getElementById("myForm");

    estadoSelect.addEventListener("change", function() {
        if (estadoSelect.value == "5") {
            fechaWrapper.style.display = "block";
            fechaEntregaContainer.style.display = "none";
            document.getElementById("fecha").setAttribute("required", "required");
        } else if (estadoSelect.value == "4") {
            fechaWrapper.style.display = "none";
            fechaEntregaContainer.style.display = "block";
            document.getElementById("fecha").removeAttribute("required");
        } else {
            fechaWrapper.style.display = "none";
            fechaEntregaContainer.style.display = "none";
            document.getElementById("fecha").removeAttribute("required");
        }
    });

    form.addEventListener("submit", function(event) {
        if (estadoSelect.value == "5" && document.getElementById("fecha").value.trim() === "") {
            alert("El campo de fecha Cierre está vacío");
            event.preventDefault();
        }
    });
    form.addEventListener("submit", function(event) {
        if (estadoSelect.value == "4" && document.getElementById("fecha").value.trim() === "") {
            alert("El campo de fecha Entrega está vacío");
            event.preventDefault();
        }
    });
</script>
@stop