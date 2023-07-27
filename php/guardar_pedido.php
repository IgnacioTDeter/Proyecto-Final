<?php
// Conexión a la base de datos
include('connect_bd.php');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del formulario
$herramienta = $_POST['herramienta'];
$cantidad_solicitada = (int)$_POST['cantidad']; // Convertir a entero para evitar inyección de SQL
$profesor = $_POST['profesor'];
$alumno = $_POST['alumno'];
$salon = $_POST['salon'];
$curso = $_POST['curso'];

// Verificar si la herramienta existe en el inventario
$sql_check_tool = "SELECT cantidad FROM Inventario WHERE herramienta = '$herramienta'";
$result_check_tool = $conexion->query($sql_check_tool);

if ($result_check_tool->num_rows === 0) {
    die("Error: La herramienta no existe en el inventario.");
}

$row = $result_check_tool->fetch_assoc();
$cantidad_disponible = (int)$row['cantidad'];

// Verificar si la cantidad solicitada es mayor a la cantidad disponible
if ($cantidad_solicitada > $cantidad_disponible) {
    die("Error: No hay suficiente cantidad disponible en el inventario.");
}

// Insertar el pedido en la tabla "Pedidos"
$sql_insert_pedido = "INSERT INTO Pedidos (dia, profesor, alumno, salon, curso, cantidad_solicitada, herramienta)
                      VALUES (CURDATE(), '$profesor', '$alumno', '$salon', '$curso', $cantidad_solicitada, '$herramienta')";

if ($conexion->query($sql_insert_pedido) === TRUE) {
    // Actualizar la cantidad en el inventario después del pedido
    $nueva_cantidad = $cantidad_disponible - $cantidad_solicitada;
    $sql_update_inventario = "UPDATE Inventario SET cantidad = $nueva_cantidad WHERE herramienta = '$herramienta'";
    $conexion->query($sql_update_inventario);
    
    echo "Pedido realizado exitosamente.";
} else {
    echo "Error al realizar el pedido: " . $conexion->error;
}

$conexion->close();
?>
