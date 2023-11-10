<?php
// Obtén el nuevo estado y el ID del pedido desde la solicitud JSON
$data = json_decode(file_get_contents("php://input"), true);
$newStatus = $data['newStatus'];
$orderId = $data['orderId'];

// Conexión a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tec1";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

$sql = "UPDATE detalles_pedidos SET estado = '$newStatus' WHERE id = '$orderId'"; // Reemplaza con tu consulta SQL

$response = array();

if ($conexion->query($sql) === TRUE) {
  $response['success'] = true;
} else {
  $response['success'] = false;
  $response['error'] = "Error al actualizar el estado: " . $conexion->error;
}

$conexion->close();

echo json_encode($response);
?>
