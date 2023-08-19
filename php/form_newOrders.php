<?php
include('../php/connect_bd.php');


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
  $registro = mysqli_query($conexion, "SELECT * FROM pedido WHERE id_pedido='$id_pedido'");
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dia'], $_POST['profesor'], $_POST['alumno'], $_POST['salon'], $_POST['curso'])) {

  $dia = $_POST['dia'];
  $profesor = $_POST['profesor'];
  $alumno = $_POST['alumno'];
  $salon = $_POST['salon'];
  $curso = $_POST['curso'];

  // Insertar el pedido en la tabla 'pedido'
  $query_pedido = "INSERT INTO pedido (dia, profesor, alumno, salon, curso) VALUES (?, ?, ?, ?, ?)";
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
  header('location: orders.php');
}


mysqli_close($conexion);
?>






<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../assets/css/orders.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title> Pañol - Formulario de Pedidos </title>

  </head>
  <body>
    <!-- Encabezado -->
    <header class="hero">
    <input type="checkbox" id="nav__check" hidden />
    <label for="nav__check" class="hamburger">
      <i class="ri-menu-line hamburger__icon"></i>
    </label>
    <nav class="nav">
      <div class="hero__logo hero__logo-1">
        <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
        <h2 class="title__hero">Pañol</h2>
        <label for="nav__check" class="hamburger">
          <i class="ri-menu-fold-line hamburger__icon"></i>
        </label>
      </div>
      <ul class="nav__list">
        <li class="nav__iteam">
          <a href="orders.php" class="nav__link">Pedidos</a>
        </li>
        <li class="nav__iteam">
          <a href="inventory.php" class="nav__link">Inventario</a>
        </li>
        <li class="nav__iteam">
          <a href="../php/logout.php" class="nav__link">Cerrar sesion</a>
        </li>
      </ul>
    </nav>
    <div class="hero__logo hero__logo-0">
      <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
      <h2 class="title__hero">Pañol</h2>
    </div>
  </header>

    <!-- Contenido principal -->
    <main>
    <section class="form__section">
     <!-- Agregamos un contenedor para el mensaje de éxito -->
      <div id="mensajeExito" class="mensaje__exito"></div>

      <!-- Formulario de pedido -->
      <form id="pedidoForm" action="form_newOrders.php" method="post">
      <fieldset class="input__container" id="fieldset">
        <legend>Datos del Pedido</legend>
        <label for="dia">Día </label>
        <input id="dia" name="dia" type="date" required>
        <label for="profesor">Profesor </label>
        <input id="profesor" name="profesor" type="text" required>
        <label for="alumno">Alumno </label>
        <input id="alumno" name="alumno" type="text" required>
        <label for="salon">Salón </label>
        <input id="salon" name="salon" type="text" required>
        <label for="curso">Curso </label>
        <input id="curso" name="curso" type="text" required>
        
        <!-- Agregar aquí los demás campos del pedido -->

        <div id="herramientas">
            <div>
                <label for="herramienta[]">Herramienta:</label>
                <input type="text" name="herramienta[]" required>
                <label for="cantidad_solicitada[]">Cantidad Solicitada:</label>
                <input type="number" name="cantidad_solicitada[]" required>
                <button class="btn__blue" type="button" onclick="eliminarHerramienta(this)">Eliminar</button>
            </div>
        </div>

        <button class="btn__blue" type="button" onclick="agregarHerramienta()">Agregar Herramienta</button><br><br>
        <input class="btn__blue"  type="submit" value="Enviar Pedido">
        <div class="action__div">
        <div class="btn__container">
          <?php if ($update) : ?>
            <button class="btn__blue" type="submit" name="update">Editar</button>
            <?php endif ?>
        </div>
        </fieldset>
        
        
      </div>
     
    </form>
  </section>
    </main>

    <!-- Script JavaScript para el formulario -->
    <script src="../assets/js/orders.js"></script>
       <script src="../assets/js/add_tool.js"></script>
  </body>
</html>