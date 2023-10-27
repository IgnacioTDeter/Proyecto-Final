<?php
include('connect_bd.php');

$id = $_GET['id_herramienta'];

$query_get_details = "SELECT * FROM detalles_inventario WHERE id_herramienta = '$id'";
$result_get_details = mysqli_query($conexion, $query_get_details);

if ($result_get_details) {
    
    $query_delete = "DELETE FROM inventario WHERE id = '$id'";
    $delete = mysqli_query($conexion, $query_delete);
    
    if ($delete) {
       
        $query_delete = "DELETE FROM detalles_inventario WHERE id_stock = '$id'";
        $delete = mysqli_query($conexion, $query_delete);
        if($delete){
            header("Location: ../pages/inventory.php");
            exit();
        }
        else{
            echo '<script>alert("Algo salió mal al borrar la herramienta"); window.history.go(-1);</script>';
        }
        
    } else {
        echo '<script>alert("Algo salió mal al borrar la herramienta"); window.history.go(-1);</script>';
    }
} else {
    echo '<script>alert("Error al obtener los detalles de la herramienta"); window.history.go(-1);</script>';
}
?>
