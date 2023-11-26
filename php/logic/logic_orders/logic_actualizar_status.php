<?php
// Obtén el nuevo estado y el ID del pedido desde la solicitud JSON
$data = json_decode(file_get_contents("php://input"), true);
$newStatus = $data['newStatus'];
$orderId = $data['orderId'];

// Conexión a la base de datos (reemplaza con tus propias credenciales)
$servername = "localhost";
$username = "panoluser";
$password = "M27j*Vz3mPBb";
$dbname = "panol";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Error de conexión: " . $conn->connect_error);
}

$sql = "UPDATE pedidos SET estado = '$newStatus' WHERE id_pedido = '$orderId'"; // Reemplaza con tu consulta SQL

$response = array();

if ($conn->query($sql) === TRUE) {
  $response['success'] = true;
} else {
  $response['success'] = false;
  $response['error'] = "Error al actualizar el estado: " . $conn->error;
}

$conn->close();

echo json_encode($response);
?>