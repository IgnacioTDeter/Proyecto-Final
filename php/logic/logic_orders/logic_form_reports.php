<?php

include('../../connect_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['profesor'], $_POST['curso'], $_POST['fecha'], $_POST['texto'])) {
    // Recuperar los datos del formulario
    $profesor = $_POST["profesor"];
    $curso = $_POST["curso"];
    $fecha = $_POST["fecha"];
    $observacion = $_POST["texto"];
    $id = $_POST["id"];


    // Verificar la conexión
    if ($conexion->connect_error) {
        die("La conexión a la base de datos falló: " . $conexion->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos
    $sql = "INSERT INTO informes (profesor, curso, fecha, texto) VALUES ('$profesor', '$curso', '$fecha', '$observacion')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Los datos se han insertado correctamente en la base de datos.";

    } else {
        echo "Error al insertar los datos: " . $conexion->error;
        
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
    header('location: ../../../pages/orders.php');
}
?>