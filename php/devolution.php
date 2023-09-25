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

    // Obtener la herramienta asociada al detalle del pedido
    $query_detalle_pedido = "SELECT herramienta, devoluciones FROM detalles_pedidos WHERE id = $detalle_pedido_id";
    $resultado = mysqli_query($conexion, $query_detalle_pedido);
    
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $herramienta = $fila['herramienta'];
        $cantidad_actual = $fila['devoluciones'];

        // Calcular la diferencia entre la cantidad devuelta y la cantidad actual
        $diferencia = $cantidad_devoluciones - $cantidad_actual;

        // Actualizar la cantidad de devoluciones en la base de datos
        $query = "UPDATE detalles_pedidos SET devoluciones = $cantidad_devoluciones WHERE id = $detalle_pedido_id";
        
        // Actualizar el inventario según la diferencia
        if ($diferencia >= 0) {
            $query_inventario = "UPDATE inventario SET cantidad = cantidad + $diferencia WHERE herramienta = '$herramienta'";
        } elseif ($diferencia <= 0) {
            $query_inventario = "UPDATE inventario SET cantidad = cantidad - " . abs($diferencia) . " WHERE herramienta = '$herramienta'";
        } else {
            // La cantidad devuelta es igual a la cantidad actual, no es necesario actualizar el inventario.
            $query_inventario = "";
        }

        if (mysqli_query($conexion, $query)) {
            if (!empty($query_inventario) && mysqli_query($conexion, $query_inventario)) {
                // Redirige de vuelta al formulario
                header("Location: ../pages/orders.php");
                exit(); // Asegura que no se ejecuten más líneas después de la redirección
            } else {
                echo "Error al actualizar inventario: " . mysqli_error($conexion);
            }
        } else {
            echo "Error al guardar devoluciones: " . mysqli_error($conexion);
        }
    } else {
        echo "Detalle de pedido no encontrado.";
    }

    // Cerrar la conexión
    mysqli_close($conexion);
}
?>
