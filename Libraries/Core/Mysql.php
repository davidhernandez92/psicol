<?php

class Mysql extends Conexion
{
  private $conexion;
  private $strQuery;
  private $arrValues;

  // Instanciamos a Conexion
  public function __construct()
  {
    $this->conexion = new Conexion();
    $this->conexion = $this->conexion->conect();
  }

  // MÉTODOS DEL CRUD

  // Método para crear registros
  public function insert(string $query, array $arrValues)
  {
    // Recibimos las propiedades
    $this->strQuery = $query;
    $this->arrValues = $arrValues;

    // Preparamos el Query
    $insert = $this->conexion->prepare($this->strQuery);
    $resInsert = $insert->execute($this->arrValues);
    if ($resInsert) {
      $lastInsert = $this->conexion->lastInsertId();
    } else {
      $lastInsert = 0;
    }
    return $lastInsert;
  }

  // Método para Listar un registro
  public function select(string $query)
  {
    $this->strQuery = $query;
    $result = $this->conexion->prepare($this->strQuery);
    $result->execute();
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data;
  }

  // Método para listar todos los registros
  public function select_all(string $query)
  {
    $this->strQuery = $query;
    $result = $this->conexion->prepare($this->strQuery);
    $result->execute();
    $data = $result->fetchall(PDO::FETCH_ASSOC);
    return $data;
  }

  // Método para actualizar registros
  public function update(string $query, array $arrValues)
  {
    $this->strQuery = $query;
    $this->arrValues = $arrValues;
    $update = $this->conexion->prepare($this->strQuery);
    $resExecute = $update->execute($this->arrValues);
    return $resExecute;
  }

  // Método para Eliminar registros
  public function delete(string $query)
  {
    $this->strQuery = $query;
    $result = $this->conexion->prepare($this->strQuery);
    $del = $result->execute();
    return $del;
  }
}
