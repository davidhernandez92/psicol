<?php

class Usuarios extends Controllers
{
  public function __construct()
  {
    parent::__construct();
    // session_start();
    // session_regenerate_id(true);
    // if (empty($_SESSION['login'])) {
    //   header('Location: ' . base_url() . '/login');
    // }
    // getPermisos(2);
  }

  public function Usuarios()
  {
    // if (empty($_SESSION['permisosMod']['r'])) {
    //   header("Location:" . base_url() . '/dashboard');
    // }
    $data['page_tag'] = "Usuarios - Sistema Reservas";
    $data['page_title'] = "Listado de Usuarios";
    $data['page_name'] = "usuarios";
    $data['page_functions_js'] = "functions_usuarios.js";
    $this->views->getView($this, "usuarios", $data);
  }

  public function setUsuario()
  {
    if ($_POST) {
      if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtDireccion']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus'])) {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
        $idUsuario = intval($_POST['idUsuario']);
        $strIdentificacion = strClean($_POST['txtIdentificacion']);
        $strNombre = ucwords(strClean($_POST['txtNombre']));
        $strApellido = ucwords(strClean($_POST['txtApellido']));
        $intTelefono = intval(strClean($_POST['txtTelefono']));
        $strDireccion = strClean($_POST['txtDireccion']);
        $strEmail = strtolower(strClean($_POST['txtEmail']));
        $intTipoId = intval(strClean($_POST['listRolid']));
        $intStatus = intval(strClean($_POST['listStatus']));
        $request_user = "";

        if ($idUsuario == 0) {
          $option = 1;
          $strPassword =  empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
          $request_user = $this->model->insertUsuario(
            $strIdentificacion,
            $strNombre,
            $strApellido,
            $intTelefono,
            $strDireccion,
            $strEmail,
            $strPassword,
            $intTipoId,
            $intStatus
          );
        } else {
          $option = 2;
          $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256", $_POST['txtPassword']);
          $request_user = $this->model->updateUsuario(
            $idUsuario,
            $strIdentificacion,
            $strNombre,
            $strApellido,
            $intTelefono,
            $strEmail,
            $strPassword,
            $intTipoId,
            $intStatus
          );
        }

        if ($request_user > 0) {
          if ($option == 1) {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
          } else {
            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
          }
        } else if ($request_user == 'exist') {
          $arrResponse = array('status' => false, 'msg' => 'El Email o la identificación ya existe, ingresa otro.');
        } else {
          $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }

  public function getUsuarios()
  {
    $arrData = $this->model->selectUsuarios();

    for ($i = 0; $i < count($arrData); $i++) {

      if ($arrData[$i]['status'] == 1) {
        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
      } else {
        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
      }

      $btnView = '<li>
                      <a type="button" class="icon-table" onClick="fntViewUsuario(' . $arrData[$i]['idpersona'] . ')" title="Asignar Permisos">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                      </a>
                  </li>';

      $btnEdit = '<li>
                      <a type="button" class="icon-table" onClick="fntEditUsuario(' . $arrData[$i]['idpersona'] . ')" title="Editar Permisos">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                            </path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                            </path>
                          </svg>
                      </a>
                  </li>';

      $btnDelete = '<li>
                      <a type="button" class="icon-table" onClick="fntDelUsuario(' . $arrData[$i]['idpersona'] . ')" title="Eliminar Permisos">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                            <polyline points="3 6 5 6 21 6"></polyline>
                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                            </path>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                          </svg>
                      </a>
                  </li>';

      $arrData[$i]['options'] = '<ul class="table-controls">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</ul>';
    }

    echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
    die();
  }

  public function getUsuario($idpersona)
  {
    if ($_SESSION['permisosMod']['r']) {
      $idusuario = intval($idpersona);
      if ($idusuario > 0) {
        $arrData = $this->model->selectUsuario($idusuario);
        if (empty($arrData)) {
          $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
        } else {
          $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      }
    }
    die();
  }

  public function delUsuario()
  {
    if ($_POST) {
      if ($_SESSION['permisosMod']['d']) {
        $intIdpersona = intval($_POST['idUsuario']);
        $requestDelete = $this->model->deleteUsuario($intIdpersona);
        if ($requestDelete) {
          $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');
        } else {
          $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      }
    }
    die();
  }

  public function perfil()
  {
    $data['page_tag'] = "Perfil";
    $data['page_title'] = "Perfil de usuario";
    $data['page_name'] = "perfil";
    $data['page_functions_js'] = "functions_usuarios.js";
    $this->views->getView($this, "perfil", $data);
  }

  public function putPerfil()
  {
    if ($_POST) {
      if (empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) || empty($_POST['txtTelefono'])) {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
        $idUsuario = $_SESSION['idUser'];
        $strIdentificacion = strClean($_POST['txtIdentificacion']);
        $strNombre = strClean($_POST['txtNombre']);
        $strApellido = strClean($_POST['txtApellido']);
        $intTelefono = intval(strClean($_POST['txtTelefono']));
        $strPassword = "";
        if (!empty($_POST['txtPassword'])) {
          $strPassword = hash("SHA256", $_POST['txtPassword']);
        }
        $request_user = $this->model->updatePerfil(
          $idUsuario,
          $strIdentificacion,
          $strNombre,
          $strApellido,
          $intTelefono,
          $strPassword
        );
        if ($request_user) {
          sessionUser($_SESSION['idUser']);
          $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
        } else {
          $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }

  public function putDFical()
  {
    if ($_POST) {
      if (empty($_POST['txtNit']) || empty($_POST['txtNombreFiscal']) || empty($_POST['txtDirFiscal'])) {
        $arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
      } else {
        $idUsuario = $_SESSION['idUser'];
        $strNit = strClean($_POST['txtNit']);
        $strNomFiscal = strClean($_POST['txtNombreFiscal']);
        $strDirFiscal = strClean($_POST['txtDirFiscal']);
        $request_datafiscal = $this->model->updateDataFiscal(
          $idUsuario,
          $strNit,
          $strNomFiscal,
          $strDirFiscal
        );
        if ($request_datafiscal) {
          sessionUser($_SESSION['idUser']);
          $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
        } else {
          $arrResponse = array("status" => false, "msg" => 'No es posible actualizar los datos.');
        }
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }
}
