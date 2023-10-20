<?php

include("../php/connect_bd.php");

if (isset($_POST['nombre'], $_POST['rubro'], $_POST['subrubro'])) {
    $nombre = $_POST['nombre'];
    $rubro = isset($_POST['rubro']) ? $_POST['rubro'] : null;
    $subrubro = isset($_POST['subrubro']) ? $_POST['subrubro'] : null;

    $query_pedido = "INSERT INTO formulario_herramientas (herramienta, rubro, sub_rubro)
                     VALUES ('$nombre','$rubro', '$subrubro')";

    $pedido = mysqli_query($conexion, $query_pedido);
    if ($pedido) {
        header('location: ../pages/inventory.php');
    $conexion->close();
    } else {
        echo json_encode('error_database');
    }

   
} 

?>