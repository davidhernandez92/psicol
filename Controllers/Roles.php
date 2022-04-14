<?php

class Roles extends Controllers
{
  public function __construct()
  {
    parent::__construct();
  }

  public function Roles()
  {
    $data['page_id'] = 3;
    $data['page_tag'] = "Roles - Sistema de Reservas";
    $data['page_name'] = "rol_usuario";
    $data['page_title'] = "Roles de Usuario";
    $data['page_functions_js'] = "functions_roles.js";
    $this->views->getView($this, "roles", $data);
  }

  // Listar Roles
  public function getRoles()
  {
    $arrData = $this->model->selectRoles();

    for ($i = 0; $i < count($arrData); $i++) {

      if ($arrData[$i]['status'] == 1) {
        $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
      } else {
        $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
      }

      $btnView = '<li>
                      <a type="button" class="icon-table" onClick="fntPermisos(' . $arrData[$i]['idrol'] . ')" title="Asignar Permisos">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                      </a>
                  </li>';

      $btnEdit = '<li>
                      <a type="button" class="icon-table" onClick="fntEditRol(' . $arrData[$i]['idrol'] . ')" title="Editar Permisos">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                            </path>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                            </path>
                          </svg>
                      </a>
                  </li>';

      $btnDelete = '<li>
                      <a type="button" class="icon-table" onClick="fntDelRol(' . $arrData[$i]['idrol'] . ')" title="Eliminar Permisos">
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

  // Listar un ROL
  public function getRol(int $idrol)
  {
    $intIdrol = intval(strClean($idrol));
    if ($intIdrol > 0) {
      $arrData = $this->model->selectRol($intIdrol);
      if (empty($arrData)) {
        $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
      } else {
        $arrResponse = array('status' => true, 'data' => $arrData);
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }

  public function getSelectRoles()
  {
    $htmlOptions = "";
    $arrData = $this->model->selectRoles();
    if (count($arrData) > 0) {
      for ($i = 0; $i < count($arrData); $i++) {
        if ($arrData[$i]['status'] == 1) {
          $htmlOptions .= '<option value="' . $arrData[$i]['idrol'] . '">' . $arrData[$i]['nombrerol'] . '</option>';
        }
      }
    }
    echo $htmlOptions;
    die();
  }


  // Crear Nuevo Rol
  public function setRol()
  {
    $intIdrol = intval($_POST['idRol']);
    $strRol =  strClean($_POST['txtNombre']);
    $strDescipcion = strClean($_POST['txtDescripcion']);
    $intStatus = intval($_POST['listStatus']);
    $request_rol = "";

    if ($intIdrol == 0) {
      //Crear
      $request_rol = $this->model->insertRol($strRol, $strDescipcion, $intStatus);
      $option = 1;
    } else {
      //Actualizar
      $request_rol = $this->model->updateRol($intIdrol, $strRol, $strDescipcion, $intStatus);
      $option = 2;
    }

    if ($request_rol > 0) {
      if ($option == 1) {
        $arrResponse = array('status' => true, 'msg' => 'Datos Guardados correctamente.');
      } else {
        $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
      }
    } else if ($request_rol == 'exist') {
      $arrResponse = array('status' => false, 'msg' => 'El Rol ingresado ya existe.');
    } else {
      $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
    }
    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    die();
  }

  // Eliminar Rol
  public function delRol()
  {
    if ($_POST) {
      $intIdrol = intval($_POST['idrol']);
      $requestDelete = $this->model->deleteRol($intIdrol);
      if ($requestDelete == 'ok') {
        $arrResponse = array('status' => true, 'msg' => 'Rol Eliminado con Éxito.');
      } else if ($requestDelete == 'exist') {
        $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
      } else {
        $arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
    die();
  }
}
