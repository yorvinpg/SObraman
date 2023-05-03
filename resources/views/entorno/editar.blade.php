@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- Agrega los estilos CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<!-- Agrega el archivo JavaScript de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<h1 class="text-center bg-info text white">Reporte Tecnico O.T</h1>
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="card" style="width: 59%; background: #EAECEE">
                <h5 class="card-header bg-info"></h5>
                <div class="card-body">
                    <form action="{{ route('solicitud.update', $id->idsolicitudOT) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
                                <div class="col-auto">
                                    <select class="form-select form-control" name="estado" aria-label="Default select example" id="estado" style="width: 225px;">
                                        @foreach ($est as $es )
                                        <option value="{{$es['idestado'] }}">{{$es['nombrE']}}</option>
                                        @endforeach
                                    </select>
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
                                <textarea class="form-control" id="detalle" value="{{$id->detallSP}}" name="detalle"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Guardar</button>
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
</script>

@stop