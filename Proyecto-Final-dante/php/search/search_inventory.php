<?php
if (isset($_GET['enviar'])) {
    $busqueda = $_GET['search'];
  
    if (!empty($busqueda)) {
      $busqueda = '%' . $conexion->real_escape_string($busqueda) . '%'; // Sanitizar la entrada
      $sql = "SELECT * FROM Inventario 
      WHERE herramienta LIKE '" . $busqueda . "'";
    } else {
      $sql = "SELECT * FROM Inventario";
    }
  } else {
    $sql = "SELECT * FROM inventario";
  }
?>