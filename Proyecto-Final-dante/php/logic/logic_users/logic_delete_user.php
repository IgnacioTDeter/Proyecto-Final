<?php

include('../../connect_bd.php');
$id_delete = $_GET['id_delete'];

// Obtener los detalles del pedido que se va a borrar
$query_get_details = "SELECT user_name, password, rol FROM usuarios WHERE id = '$id_delete'";
$result_get_details = mysqli_query($conexion, $query_get_details);

if ($result_get_details) {
    
    // Luego de actualizar el inventario para todos los detalles del pedido, puedes borrar el pedido principal
    $query_delete = "DELETE FROM usuarios WHERE id = '$id_delete'";
    $delete = mysqli_query($conexion, $query_delete);
    
    if ($delete) {
        header("Location: ../../../pages/users.php");
        exit();
    } else {
        echo '<script>alert("Algo salió mal al borrar el pedido"); window.history.go(-1);</script>';
    }
} else {
    echo '<script>alert("Error al obtener los detalles del pedido"); window.history.go(-1);</script>';
}
?>

?>