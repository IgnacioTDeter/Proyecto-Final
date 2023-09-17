<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establece la conexión a la base de datos (ajusta los valores según tu configuración)
    $conexion = mysqli_connect('localhost', 'root', '', 'tec1');

    if (!$conexion) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    // Obtén los valores del formulario
    $id_pedido = $_POST['id_pedido'];
    $id_herramienta = $_POST['id_herramienta'];
    $devoluciones = $_POST['devoluciones'];

    // Realiza la actualización en la base de datos
    $sql = "UPDATE detalles_pedidos SET devoluciones = ? WHERE id_pedido = ? AND id_herramienta = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iii", $devoluciones, $id_pedido, $id_herramienta);

        if (mysqli_stmt_execute($stmt)) {
            echo "Devoluciones actualizadas exitosamente.";
        } else {
            echo "Error al actualizar las devoluciones: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($conexion);
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
} else {
    echo "Falta información importante (id_pedido, id_herramienta o devoluciones).";
}
?>
