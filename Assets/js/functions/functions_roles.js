var tableRoles;

document.addEventListener("DOMContentLoaded", function () {
  // Configuración DataTable
  tableRoles = $("#tableRoles").DataTable({
    dom: "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
      "<'table-responsive'tr>" +
      "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    oLanguage: {
      oPaginate: {
        sPrevious: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        sNext: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
      },
      sInfo: "Mostrando página _PAGE_ de _PAGES_",
      sSearch: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
      sSearchPlaceholder: "Buscar",
      sLengthMenu: "Resultados:  _MENU_",
    },
    stripeClasses: [],
    lengthMenu: [5, 10, 20, 50],
    pageLength: 5,
    aProcessing: true,
    aServerSide: true,
    responsive: true,
    bDestroy: true,
    order: [
      [0, "desc"]
    ],

    // Config y peticiones Ajax
    ajax: {
      url: " " + base_url + "/Roles/getRoles",
      dataSrc: "",
    },
    columns: [{
        data: "idrol"
      },
      {
        data: "nombrerol"
      },
      {
        data: "descripcion"
      },
      {
        data: "status"
      },
      {
        data: "options"
      },
    ],
  });

  // AGREGAR NUEVO ROL
  var formRol = document.querySelector("#formRol");
  formRol.onsubmit = function (e) {
    e.preventDefault();

    // Capturar datos del Formulario
    var intIdRol = document.querySelector("#idRol").value;
    var strNombre = document.querySelector("#txtNombre").value;
    var strDescripcion = document.querySelector("#txtDescripcion").value;
    var intStatus = document.querySelector("#listStatus").value;

    if (strNombre == "" || strDescripcion == "" || intStatus == "") {
      swal("Atención", "Todos los campos son obligatorios.", "error");
      return false;
    }

    // Petición AJAX
    var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    var ajaxUrl = base_url + "/Roles/setRol";
    var formData = new FormData(formRol); // Obtenemos todos los datos del Formulario formRol
    request.open("POST", ajaxUrl, true); // Método para enviar información
    request.send(formData);

    request.onreadystatechange = function () {
      if (request.readyState == 4 && request.status == 200) {
        var objData = JSON.parse(request.responseText);
        if (objData.status) {
          $("#modalFormRol").modal("hide");
          formRol.reset();
          swal("Rol de Usuario :)", objData.msg, "success");
          tableRoles.ajax.reload();
        } else {
          swal("Upps :(", objData.msg, "error");
        }
      }
      return false;
    };
  };
});

function openModal() {
  document.querySelector("#idRol").value = "";
  document.querySelector("#btnActionForm").classList.replace("btn-info", "btn-primary");
  document.querySelector("#btnText").innerHTML = "Guardar";
  document.querySelector("#titleModal").innerHTML = "Crear Nuevo Rol";
  document.querySelector("#formRol").reset();
  $("#modalFormRol").modal("show");
}

// ACTUALIZAR ROL
function fntEditRol(idrol) {
  document.querySelector("#titleModal").innerHTML = "Actualizar Rol";
  document.querySelector("#btnActionForm").classList.replace("btn-primary", "btn-info");
  document.querySelector("#btnText").innerHTML = "Actualizar";

  var idrol = idrol;
  var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Roles/getRol/" + idrol;
  request.open("GET", ajaxUrl, true);
  request.send();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {

        document.querySelector("#idRol").value = objData.data.idrol;
        document.querySelector("#txtNombre").value = objData.data.nombrerol;
        document.querySelector("#txtDescripcion").value = objData.data.descripcion;

        if (objData.data.status == 1) {
          var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
        } else {
          var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
        }
        var htmlSelect = `${optionSelect}
                                  <option value="1">Activo</option>
                                  <option value="2">Inactivo</option>
                          `;
        document.querySelector("#listStatus").innerHTML = htmlSelect;
        $("#modalFormRol").modal("show");
      } else {
        swal("Error", objData.msg, "error");
      }
    }
  };
}

// ELIMINAR ROL
function fntDelRol(idrol) {
  var idrol = idrol;
  swal({
    title: "Eliminar Rol",
    text: "¿Realmente quiere eliminar el Rol?",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Si, eliminar!",
    cancelButtonText: "No, cancelar!",
    closeOnConfirm: false,
    closeOnCancel: true,
  }).then(function (result) {
    if (result.value) {
      var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
      var ajaxUrl = base_url + "/Roles/delRol/";
      var strData = "idrol=" + idrol;
      request.open("POST", ajaxUrl, true);
      request.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      request.send(strData);
      request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
          var objData = JSON.parse(request.responseText);
          if (objData.status) {
            swal("¡Eliminado!", objData.msg, "success");
            tableRoles.ajax.reload();
          } else {
            swal("¡Atención!", objData.msg, "error");
          }
        }
      };
    }
  })
}

// ASIGNAR PERMISOS
function fntPermisos(idrol) {
  var idrol = idrol;
  var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Permisos/getPermisosRol/" + idrol;
  request.open("GET", ajaxUrl, true);
  request.send();

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      document.querySelector("#contentAjax").innerHTML = request.responseText;
      $(".modalPermisos").modal("show");
      document.querySelector("#formPermisos").addEventListener("submit", fntSavePermisos, false);
    }
  };

}

// GUARDAR PERMISOS
function fntSavePermisos(event) {
  event.preventDefault();
  var request = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "/Permisos/setPermisos";
  var formElement = document.querySelector("#formPermisos");
  var formData = new FormData(formElement);
  request.open("POST", ajaxUrl, true);
  request.send(formData);

  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        swal("Permisos de usuario", objData.msg, "success");
      } else {
        swal("Error", objData.msg, "error");
      }
    }
  };
}