<?php 
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
 

  $pedidos = "INSERT INTO pedidos (dia, profesor, alumno, salon, curso) 
    VALUES ('$dia', '$profesor', '$alumno', '$salon', '$curso')";
  $result = mysqli_query($conexion, $pedidos) or die("¡Algo salió mal!");
  header('location: ../pages/orders.php');
}




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dia'], $_POST['profesor'], $_POST['alumno'], $_POST['salon'], $_POST['curso'])) {

  $dia = $_POST['dia'];
  $profesor = $_POST['profesor'];
  $alumno = $_POST['alumno'];
  $salon = $_POST['salon'];
  $curso = $_POST['curso'];

  // Insertar el pedido en la tabla 'pedido'
  $query_pedido = "INSERT INTO pedidos (dia, profesor, alumno, salon, curso) VALUES (?, ?, ?, ?, ?)";
  $stmt_pedido = $conexion->prepare($query_pedido);
  $stmt_pedido->bind_param("sssss", $dia, $profesor, $alumno, $salon, $curso);

  if ($stmt_pedido->execute()) {
      $pedido_id = $stmt_pedido->insert_id;

      // Insertar detalles de las herramientas en la tabla 'detalles_pedidos'
      if (isset($_POST['herramienta'], $_POST['cantidad_solicitada'])) {
          $herramientas = $_POST['herramienta'];
          $cantidades = $_POST['cantidad_solicitada'];

          foreach ($herramientas as $i => $herramienta) {
              $cantidad_solicitada = $cantidades[$i];

              // Obtener el ID de la herramienta desde la tabla inventario
              $query_id_herramienta = "SELECT id_herramienta FROM inventario WHERE herramienta = ?";
              $stmt_id_herramienta = $conexion->prepare($query_id_herramienta);
              $stmt_id_herramienta->bind_param("s", $herramienta);
              $stmt_id_herramienta->execute();
              $stmt_id_herramienta->bind_result($id_herramienta);
              $stmt_id_herramienta->fetch();
              $stmt_id_herramienta->close();

              // Insertar en detalles_pedidos
              $query_detalle = "INSERT INTO detalles_pedidos (id_pedido, id_herramienta, herramienta, cantidad_solicitada) VALUES (?, ?, ?, ?)";
              $stmt_detalle = $conexion->prepare($query_detalle);
              $stmt_detalle->bind_param("iisi", $pedido_id, $id_herramienta, $herramienta, $cantidad_solicitada);
              $stmt_detalle->execute();
              $stmt_detalle->close();
          }
      }

      echo "Pedido procesado exitosamente";
  } else {
      echo "Error al procesar el pedido";
  }

  $stmt_pedido->close();
  $conexion->close();
  header('location: ../pages/orders.php');
}


mysqli_close($conexion);
?>