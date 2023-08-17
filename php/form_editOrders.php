<?php
include('../php/connect_bd.php');

$id_pedido = $_POST['id_pedido'];
$dia = $_POST['dia'];
$profesor = $_POST['profesor'];
$alumno = $_POST['alumno'];
$salon = $_POST['salon'];
$curso = $_POST['curso'];

$sql = "UPDATE pedido SET  dia='$dia', profesor='$profesor', alumno='$alumno', salon='$salon', curso='$curso' WHERE id_pedido=$id_pedido";
  

if (mysqli_query($conexion, $sql)) {
    echo "Actualización exitosa.";
  } else {
    echo "ERROR: no se pudo ejecutar $sql. " . mysqli_error($conexion);
  }

  header('location: ../pages/orders.php');