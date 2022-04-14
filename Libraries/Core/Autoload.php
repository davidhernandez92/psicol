<?php

//Función para cargar todas las clases
spl_autoload_register(function ($class) {
  if (file_exists("Libraries/Core/" . $class . ".php")) {
    require_once("Libraries/Core/" . $class . ".php");
  }
});
