<?php

if (isset($_POST['nombre'], $_POST['cantidad'], $_POST['proveedor'], $_POST['ubicacion'], $_POST['rubro'], $_POST['subrubro'])) {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $rubro = isset($_POST['rubro']) ? $_POST['rubro'] : null;
    $subrubro = isset($_POST['subrubro']) ? $_POST['subrubro'] : null;
    $proveedor = $_POST['proveedor'];
    $ubicacion = $_POST['ubicacion'];

    $query_pedido = "INSERT INTO inventario (herramienta, cantidad, rubro, sub_rubro, proveedor, ubicacion)
                     VALUES ('$nombre', '$cantidad', '$rubro', '$subrubro', '$proveedor', '$ubicacion')";

    if ($conexion->query($query_pedido)) {
        header("location: form_newTool.php");
    } else {
        echo json_encode('error_database');
    }

    $conexion->close();
    header('location: inventory.php');
} 

?>