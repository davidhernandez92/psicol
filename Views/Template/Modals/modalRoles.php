<!-- Modal -->
<div class="modal fade" id="modalFormRol" tabindex="-1" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Agregar Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <form id="formRol" name="formRol">
        <input type="hidden" id="idRol" name="idRol" value="">
        <div class="modal-body">
          <div class="form-group mb-4">
            <label for="txtNombre">Nombre</label>
            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre del Rol">
          </div>

          <div class="form-group mb-4">
            <label for="txtDescripcion">Descripción</label>
            <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
          </div>

          <div class="form-group mb-4">
            <label for="listStatus">Estado</label>
            <select class="form-control selectpicker" id="listStatus" name="listStatus" required>
              <option value="1">Activo</option>
              <option value="2">Inactivo</option>
            </select>
          </div>

        </div>

        <div class="modal-footer justify-content-center">
          <button id="btnActionForm" type="submit" class="btn btn-primary mr-3"><span id="btnText">Guardar</span></button>
          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
        </div>
      </form>

    </div>
  </div>
</div>