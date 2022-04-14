<!-- Modal -->
<div class="modal fade modalPermisos" tabindex="-1" data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Permisos Roles de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
            <line x1="18" y1="6" x2="6" y2="18"></line>
            <line x1="6" y1="6" x2="18" y2="18"></line>
          </svg>
        </button>
      </div>

      <form id="formPermisos" name="formPermisos">
        <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>">
        <div class="modal-body">
          <div class=" widget-content widget-content-area">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th>Módulo</th>
                    <th class="text-center">Ver</th>
                    <th class="text-center">Crear</th>
                    <th class="text-center">Actualizar</th>
                    <th class="text-center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $modulos = $data['modulos'];
                  for ($i = 0; $i < count($modulos); $i++) {

                    $permisos = $modulos[$i]['permisos'];
                    $rCheck = $permisos['r'] == 1 ? " checked " : "";
                    $wCheck = $permisos['w'] == 1 ? " checked " : "";
                    $uCheck = $permisos['u'] == 1 ? " checked " : "";
                    $dCheck = $permisos['d'] == 1 ? " checked " : "";

                    $idmod = $modulos[$i]['idmodulo'];
                  ?>
                    <tr>
                      <td>
                        <?= $no; ?>
                        <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" required>
                      </td>

                      <td>
                        <?= $modulos[$i]['titulo']; ?>
                      </td>

                      <td class="text-center">
                        <label class="switch s-icons s-outline s-outline-primary m-0 mt-2">
                          <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>>
                          <span class="slider round"></span>
                        </label>
                      </td>

                      <td class="text-center">
                        <label class="switch s-icons s-outline s-outline-primary m-0 mt-2">
                          <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $rCheck ?>>
                          <span class="slider round"></span>
                        </label>
                      </td>

                      <td class="text-center">
                        <label class="switch s-icons s-outline s-outline-primary m-0 mt-2">
                          <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $rCheck ?>>
                          <span class="slider round"></span>
                        </label>
                      </td>

                      <td class="text-center">
                        <label class="switch s-icons s-outline s-outline-primary m-0 mt-2">
                          <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $rCheck ?>>
                          <span class="slider round"></span>
                        </label>
                      </td>

                    </tr>
                  <?php
                    $no++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="modal-footer justify-content-center mt-2">
          <button type="submit" class="btn btn-primary mr-3">Guardar</button>
          <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancelar</button>
        </div>

      </form>

    </div>
  </div>
</div>