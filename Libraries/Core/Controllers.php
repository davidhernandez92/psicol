<?php

class Controllers
{
  public function __construct()
  {
    $this->views = new Views();
    $this->loadModel();
  }

  // Metodo para cargar los modelos
  public function loadModel()
  {
    $model = get_class($this) . "Model";
    $routClass = "Models/" . $model . ".php";
    if (file_exists($routClass)) {
      require_once($routClass);
      $this->model = new $model();
    }
  }
}
