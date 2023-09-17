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

  // Insertar el pedido en la tabla 'pedidos'
  $query_pedido = "INSERT INTO pedidos (dia, profesor, alumno, salon, curso) VALUES (?, ?, ?, ?, ?)";
  $stmt_pedido = $conexion->prepare($query_pedido);
  $stmt_pedido->bind_param("sssss", $dia, $profesor, $alumno, $salon, $curso);

  if ($stmt_pedido->execute()) {
      $pedido_id = $stmt_pedido->insert_id;

      if (isset($_POST['herramienta'], $_POST['cantidad_solicitada'])) {
          $herramientas = $_POST['herramienta'];
          $cantidades = $_POST['cantidad_solicitada'];

          foreach ($herramientas as $i => $herramienta) {
              if (isset($cantidades[$i])) {
                  $cantidad_solicitada = $cantidades[$i];

                  $query = "SELECT cantidad FROM inventario WHERE herramienta = ?";
                  $stmt = $conexion->prepare($query);
                  $stmt->bind_param("s", $herramienta);
                  $stmt->execute();
                  $stmt->bind_result($cantidad_actual);
                  $stmt->fetch();
                  $stmt->close();

                  if ($cantidad_actual !== null) {
                      $cantidad_nueva = $cantidad_actual - $cantidad_solicitada;

                      if ($cantidad_nueva >= 0) {
                          $query = "UPDATE inventario SET cantidad = ? WHERE herramienta = ?";
                          $stmt = $conexion->prepare($query);
                          $stmt->bind_param("is", $cantidad_nueva, $herramienta);
                          $stmt->execute();
                          $stmt->close();
                      } else {// borrar todo esto  y hacerlo por alerta js 
                          echo "Error: La cantidad resultante para la herramienta '$herramienta' sería menor que 0.";
                      }
                  } else {
                      echo "La herramienta '$herramienta' no fue encontrada en la base de datos.";
                  }
              } else {
                  echo "Error: No se proporcionó una cantidad para la herramienta '$herramienta'.";
              }
          }
      }// borrar todo esto  y hacerlo por alerta js 

      echo "Pedido procesado exitosamente";
  } else {
      echo "Error al procesar el pedido";
  }// borrar todo esto  y hacerlo por alerta js 

  $stmt_pedido->close();
  $conexion->close();
  header('location: ../pages/orders.php');
}



mysqli_close($conexion);
?>