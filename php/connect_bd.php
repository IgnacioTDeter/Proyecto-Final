<?php

$conexion = mysqli_connect('localhost', 'panoluser', 'M27j*Vz3mPBb', 'panol');

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

?>
