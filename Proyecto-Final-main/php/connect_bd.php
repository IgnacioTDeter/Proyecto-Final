<?php

$conexion = mysqli_connect('localhost', 'root', '', 'tec1');

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>