<?php 

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
  header('location: ../pages/orders.php');


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

  $id_pedido = $_GET['edit'];

  $query_order = "SELECT * FROM pedidos WHERE id_pedido = $id_pedido";

  $query_details_order = "SELECT * FROM detalles_pedidos WHERE id_pedido = $id_pedido";

  $details_order = mysqli_query($conexion, $query_details_order);

  $order = mysqli_query($conexion, $query_order);

  $row_details = mysqli_fetch_assoc($details_order);
  
  $row_order = mysqli_fetch_assoc($order);

?>