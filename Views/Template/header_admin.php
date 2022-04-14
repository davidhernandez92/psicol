<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title><?= $data['page_tag']; ?></title>
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="<?= media(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= media(); ?>/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="<?= media(); ?>/css/styles.css" rel="stylesheet" type="text/css" />
  <link href="<?= media(); ?>/plugins/animate/animate.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="<?= media(); ?>/css/components/custom-modal.css" rel="stylesheet" type="text/css" />
  <link href="<?= media(); ?>/plugins/table/datatable/datatables.css" rel="stylesheet" type="text/css">
  <link href="<?= media(); ?>/plugins/table/datatable/dt-global_style.css" rel="stylesheet" type="text/css">
  <link href="<?= media(); ?>/plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
  <link href="<?= media(); ?>/css/forms/switches.css" rel="stylesheet" type="text/css">
  <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="alt-menu sidebar-noneoverflow">

  <!--  BEGIN NAVBAR  -->
  <div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm expand-header">
      <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg></a>

      <ul class="navbar-item flex-row ml-auto">

        <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
          <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </a>

          <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
            <div class="user-profile-section">
              <div class="media mx-auto">
                <img src="<?= media(); ?>/img/perfil-jesus.png" class="img-fluid mr-2" alt="avatar">
                <div class="media-body">
                  <h5>David Hernández</h5>
                  <p>Software Developer</p>
                </div>
              </div>
            </div>
            <div class="dropdown-item">
              <a href="<?= base_url(); ?>/perfil">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg> <span>Perfil</span>
              </a>
            </div>
            <div class="dropdown-item">
              <a href="<?= base_url(); ?>/opciones">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                  <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                  <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                </svg> <span>Configuración</span>
              </a>
            </div>
            <div class="dropdown-item">
              <a href="<?= base_url(); ?>/logout">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg> <span>Salir</span>
              </a>
            </div>
          </div>

        </li>
      </ul>
    </header>
  </div>
  <!--  END NAVBAR  -->

  <div class="main-container sidebar-closed sbar-open" id="container">

    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <?php require_once("nav_admin.php"); ?>
    <!--  END SIDEBAR  -->