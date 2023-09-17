<?php
// Conexión a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tec1";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

// Obtener el estado actual de todos los pedidos desde la base de datos
$sql = "SELECT id, estado FROM detalles_pedidos"; // Reemplaza con tu consulta SQL
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $data[] = $row; // Agregar cada fila a la matriz de datos
  }
}

$conn->close();

echo json_encode($data);
?>
