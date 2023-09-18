<?php
    include('connect_bd.php');

    $id_pedido = $_GET['id_pedido'];
    $query_delete = "DELETE FROM pedidos WHERE id_pedido = '$id_pedido'";
    $query_delete_details = "DELETE FROM detalles_pedidos WHERE id_pedido = '$id_pedido'";

    $delete_details = mysqli_query($conexion, $query_delete_details);
    $delete = mysqli_query($conexion, $query_delete);
    
    if($delete) {
        header("Location: ../pages/orders.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo 
        '<script> 
            alert ("Algo salió mal"); window.history.go(-1);
        </script>';
    }
?>



