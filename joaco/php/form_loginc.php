<?php
include 'connect_bd.php';

$update = false;
$del = false;
$dia = date("Y-m-d");
$profesor = "";
$alumno = "";
$salon = "";
$curso = "";
$cantidad_solicitada = "";
$herramienta = "";

if (isset($_POST['add'])) {
  $dia = $_POST['dia'];
  $profesor = $_POST['profesor'];
  $alumno = $_POST['alumno'];
  $salon = $_POST['salon'];
  $curso = $_POST['curso'];
  $cantidad_solicitada = $_POST['cantidad_solicitada'];
  $herramienta = $_POST['herramienta'];

  $pedidos = "INSERT INTO pedidos (dia, profesor, alumno, salon, curso, cantidad_solicitada, herramienta) 
    VALUES ('$dia', '$profesor', '$alumno', '$salon', '$curso')";
  $result = mysqli_query($conexion, $pedidos) or die("¡Algo salió mal!");
  header('location: ../pages/orders.php');
}

if (isset($_POST['update'])) {
  $id_pedido = $_POST['id_pedido'];
  $dia = $_POST['dia'];
  $profesor = $_POST['profesor'];
  $alumno = $_POST['alumno'];
  $salon = $_POST['salon'];
  $curso = $_POST['curso'];
 

  $sql = "UPDATE pedidos SET  dia='$dia', profesor='$profesor', alumno='$alumno', salon='$salon', curso='$curso' WHERE id_pedido=$id_pedido";
  
  
  if (mysqli_query($conexion, $sql)) {
    echo "Actualización exitosa.";
    
  } else {
    echo "ERROR: no se pudo ejecutar $sql. " . mysqli_error($conexion);
  }
  header('location: ../pages/orders .php');


}

if (isset($_GET['edit'])) {
  $id_pedido = $_GET['edit'];
  $update = true;
  $registro = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_pedido='$id_pedido'");
  if (mysqli_num_rows($registro) == 1) {
    $n = mysqli_fetch_array($registro);
    $id = $n['id_pedido'];
    $dia = $n['dia'];
    $profesor = $n['profesor'];
    $alumno = $n['alumno'];
    $salon = $n['salon'];
    $curso = $n['curso'];
  } else {
    echo ("ERROR: datos no autorizados");
  }
}

mysqli_close($conexion);
?>