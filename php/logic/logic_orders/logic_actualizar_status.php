<?php
// Obtén el nuevo estado y el ID del pedido desde la solicitud JSON
$data = json_decode(file_get_contents("php://input"), true);
$newStatus = $data['newStatus'];
$orderId = $data['orderId'];

include('../../connect_bd.php');

$sql = "UPDATE detalles_pedidos SET estado = '$newStatus' WHERE id = '$orderId'"; // Reemplaza con tu consulta SQL

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
