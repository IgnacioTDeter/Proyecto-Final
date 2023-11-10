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

                  if ($cantidad_actual != null ) {
                      if ($cantidad_solicitada <= $cantidad_actual) {
                          $query_detalle = "INSERT INTO detalles_pedidos (id_pedido, id_herramienta, herramienta, cantidad_solicitada) VALUES (?, ?, ?, ?)";
                          $stmt_detalle = $conexion->prepare($query_detalle);
                          $stmt_detalle->bind_param("iisi", $pedido_id, $id_herramienta, $herramienta, $cantidad_solicitada);
                          $stmt_detalle->execute();
                          $stmt_detalle->close();

                          $cantidad_nueva = $cantidad_actual - $cantidad_solicitada;
                          $query = "UPDATE inventario SET cantidad = ? WHERE herramienta = ?";
                          $stmt = $conexion->prepare($query);
                          $stmt->bind_param("is", $cantidad_nueva, $herramienta);
                          $stmt->execute();
                          $stmt->close();
                      } else {
                          echo "Error: La cantidad solicitada para la herramienta '$herramienta' es mayor que la cantidad disponible en stock.";
                      }
                  } else {
                      echo "La herramienta '$herramienta' no fue encontrada en la base de datos.";
                  }
              } else {

                  echo "Error: No se proporcionó una cantidad para la herramienta '$herramienta'.";
              }
          }
      } else {
          echo "Error: No se proporcionaron herramientas o cantidades para el pedido.";
      }

      echo "Pedido procesado exitosamente";
  } else {
      echo "Error al procesar el pedido";
  }

  $stmt_pedido->close();
  $conexion->close();
  header('location: ../pages/orders.php');
}
?>
