<form action="" method="POST" id="formActualizar" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">
    <div class="modal fade text-left" id="ModalE" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">VISTA</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Estado</label>
                        <div class="col-auto">
                            <select class="form-select form-control" name="ubi" aria-label="Default select example"
                                id="ubi" style="width: 225px;">
                                @foreach ($est as $es )
                                <option value="{{$es['idestado'] }}">{{$es['nombrE']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-4 col-form-label">Tecnico</label>
                        <div class="col-auto">
                            <select class="form-select form-control" name="ubi" aria-label="Default select example"
                                id="ubi" style="width: 225px;">
                                @foreach ($tec as $t )
                                <option value="{{$t['idtecnico'] }}">{{$t['nombre_tec']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
</form>

<script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var modal = $(this)
      modal.find('.modal-body #id').val(id)
    })
    $('form').submit(function (event) {
        event.preventDefault();
        var id = $('#id').val();
        var estado = $('#ubi').val();
        var tecnico = $('#tec').val();
        $.ajax({
          url: '/update/' + id,
          type: 'PUT',
          data: {
            estado: estado,
            tecnico: tecnico
          },
          success: function () {
            location.reload();
          }
        });
      });

</script>
