<form action="{{ route('solicitud.update', $item->idsolicitudOT) }}" method="post">
    @csrf
    @method('PUT')
    <div class="text-left modal fade" id="ModalE" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="text-center modal-title">Reporte Tecnico O.T</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
                        <textarea class="form-control" id="detalle" name="detalle"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </div>
        </div>
</form>