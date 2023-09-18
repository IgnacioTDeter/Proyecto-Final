<?php


$busqueda = '';
if (isset($_GET['enviar'])) {
  $busqueda = $_GET['search'];
}

$sql = "SELECT * FROM pedidos";
if (!empty($busqueda)) {
  $busqueda = '%' . $conexion->real_escape_string($busqueda) . '%'; // Sanitize input
  $sql .= " WHERE profesor LIKE '$busqueda'";
}

$orders = mysqli_query($conexion, $sql);

if (!$orders) {
  echo 'Query error: ' . mysqli_error($conexion);
  die();
}


?>