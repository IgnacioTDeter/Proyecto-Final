<?php
include('connect_bd.php');

$id_pedido = $_GET['id_pedido'];

// Obtener los detalles del pedido que se va a borrar
$query_get_details = "SELECT herramienta, cantidad_solicitada, devoluciones FROM detalles_pedidos WHERE id_pedido = '$id_pedido'";
$result_get_details = mysqli_query($conexion, $query_get_details);

if ($result_get_details) {
    while ($row = mysqli_fetch_assoc($result_get_details)) {
        $herramienta = $row['herramienta'];
        $cantidad_solicitada = $row['cantidad_solicitada'];
        $cantidad_devuelta = $row['devoluciones'];
        $cantidad_restante = $cantidad_solicitada - $cantidad_devuelta;
        
        // Actualizar el inventario solo con la cantidad restante
        $query_update_inventory = "UPDATE inventario SET cantidad = cantidad + $cantidad_restante WHERE herramienta = '$herramienta'";
        $update_inventory = mysqli_query($conexion, $query_update_inventory);
        
        if (!$update_inventory) {
            echo '<script>alert("Error al actualizar inventario"); window.history.go(-1);</script>';
            exit();
        }
    }
    
    // Luego de actualizar el inventario para todos los detalles del pedido, puedes borrar el pedido principal
    $query_delete = "DELETE FROM pedidos WHERE id_pedido = '$id_pedido'";
    $delete = mysqli_query($conexion, $query_delete);
    
    if ($delete) {
        header("Location: ../pages/orders.php");
        exit();
    } else {
        echo '<script>alert("Algo salió mal al borrar el pedido"); window.history.go(-1);</script>';
    }
} else {
    echo '<script>alert("Error al obtener los detalles del pedido"); window.history.go(-1);</script>';
}
?>
