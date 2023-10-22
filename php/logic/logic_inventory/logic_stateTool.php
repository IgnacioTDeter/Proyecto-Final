<?php

$conexion = mysqli_connect('localhost', 'root', '', 'tec1');

// Verifica si se recibió el ID de la herramienta y el nuevo estado
if (isset($_POST['id_herramienta']) && isset($_POST['nuevo_estado'])) {
    $id_herramienta = $_POST['id_herramienta'];

    $nuevo_estado = $_POST['nuevo_estado'];

    $query_actualizar = "UPDATE detalles_inventario SET estado='$nuevo_estado' WHERE id=$id_herramienta";

    
    if ($conexion->query($query_actualizar)) {
        header("Location: ../../../pages/inventory.php");
        exit(); // Asegúrate de terminar el script después de redirigir
    } else {
        echo json_encode(array('error' => 'error_database', 'message' => $conexion->error));
    }
    
} else {

}

?>