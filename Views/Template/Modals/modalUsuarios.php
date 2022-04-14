<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Agregar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <form id="formUsuario" name="formUsuario">
        <input type="hidden" id="idUsuario" name="idUsuario" value="">
        <div class="modal-body">

          <div class="form-row mb-4">
            <div class="form-group col-md-6">
              <label for="txtIdentificacion">Identificación</label>
              <input type="text" class="form-control valid validText" id="txtIdentificacion" name="txtIdentificacion" placeholder="1075262890">
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombres</label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" placeholder="David">
            </div>
            <div class="form-group col-md-6">
              <label for="txtApellido">Apellidos</label>
              <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" placeholder="Hernández">
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="form-group col-md-6">
              <label for="txtTelefono">Telefóno</label>
              <input type="text" class="form-control valid validText" id="txtTelefono" name="txtTelefono" placeholder="3166852866">
            </div>
            <div class="form-group col-md-6">
              <label for="txtDireccion">Dirección</label>
              <input type="text" class="form-control valid validText" id="txtDireccion" name="txtDireccion" placeholder="Av 26 # 6W - 50">
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control valid validText" id="txtEmail" name="txtEmail" placeholder="correo@dominio.com">
            </div>
            <div class="form-group col-md-6">
              <label for="txtPassword">Password</label>
              <input type="password" class="form-control valid validText" id="txtPassword" name="txtPassword">
            </div>
          </div>

          <div class="form-row mb-4">
            <div class="form-group col-md-6">
              <label for="listRolid">Tipo usuario</label>
              <select class="form-control" data-live-search="true" id="listRolid" name="listRolid" required>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="listStatus">Estado</label>
              <select class="form-control selectpicker" id="listStatus" name="listStatus" required>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
              </select>
            </div>
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