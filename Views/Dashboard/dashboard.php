<?php headerAdmin($data); ?>

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">

  <div class="layout-px-spacing">

    <!-- TITLE -->
    <div class="page-header">
      <div class="page-title">
        <h3><?= $data['page_title']; ?></h3>
      </div>
    </div>

    <!-- CONTENT AREA -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
        <div class="widget widget-content-area br-4">

        </div>
      </div>
    </div>
    <!-- END CONTENT AREA -->

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