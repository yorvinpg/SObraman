<div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="confirm-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content alert alert-info " style="background-color: #17a2b8;">
            <div class="modal-header">
                <h5 class="modal-title" id="confirm-modal-label">DETALLE ANULADO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <textarea class="form-control" id="detalle" name="Anu" name="detalle"></textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" form="delete-form-modal" onsubmit="return confirm('¿Estás seguro de eliminar esta solicitud OT?')" >ANULAR</button>
            </div>
        </div>
    </div>
</div>