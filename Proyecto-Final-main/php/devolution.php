<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conectar a la base de datos (ajusta las credenciales según tu configuración)
    $conexion = mysqli_connect('localhost', 'root', '', 'tec1');

    // Verificar la conexión
    if (mysqli_connect_error()) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener los valores del formulario
    $detalle_pedido_id = isset($_POST['detalle_pedido_id']) ? $_POST['detalle_pedido_id'] : 0;
    $cantidad_devoluciones = isset($_POST['cantidad_devoluciones']) ? $_POST['cantidad_devoluciones'] : 0;

    // Actualizar la base de datos
    $query = "UPDATE detalles_pedidos SET devoluciones = $cantidad_devoluciones WHERE id = $detalle_pedido_id";


    if (mysqli_query($conexion, $query)) {
        // Redirige de vuelta al formulario
        header("Location: ../pages/orders.php");
        exit(); // Asegura que no se ejecuten más líneas después de la redirección
    } else {
        echo "Error al guardar devoluciones: " . mysqli_error($conexion);
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>