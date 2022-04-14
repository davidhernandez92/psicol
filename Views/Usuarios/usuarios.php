<?php
headerAdmin($data);
getModal('modalUsuarios', $data);
?>

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
  <div class="layout-px-spacing">
    <div class="page-header d-flex align-items-center py-3">
      <div class="page-title mb-0 mt-0 mr-3">
        <h3><?= $data['page_title']; ?></h3>
      </div>
      <div>
        <button class="btn btn-primary mr-2" type="button" onclick="openModal();">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
          </svg> Nuevo</button>
      </div>
    </div>

    <div class="row layout-top-spacing">
      <!-- CONTENT AREA -->
      <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="statbox widget box box-shadow">
          <div class="widget-content widget-content-area">
            <table id="tableUsuarios" class="table dt-table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Identificación</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Email</th>
                  <th>Rol</th>
                  <th class="text-center">Estado</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- END CONTENT AREA -->
    </div>

  </div>

  <!--  COPYRIGHT  -->
  <div class="footer-wrapper">
    <div class="footer-section f-section-1">
      <p class="">Copyright © 2022 | By Ing. David Hernández</p>
    </div>
    <div class="footer-section f-section-2">
      <p class="">Sistema Reservas - Psicol <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
          <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
          </path>
        </svg></p>
    </div>
  </div>
  <!--  END COPYRIGHT  -->

</div>
<!--  END CONTENT AREA  -->

<?php footerAdmin($data); ?>