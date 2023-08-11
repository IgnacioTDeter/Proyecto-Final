<?php
include("../php/connect_bd.php");
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
    VALUES ('$dia', '$profesor', '$alumno', '$salon', '$curso', '$cantidad_solicitada', '$herramienta')";
  $result = mysqli_query($conexionecction, $pedidos) or die("¡Algo salió mal!");
  header('location: orders.php');
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $dia = $_POST['dia'];
  $profesor = $_POST['profesor'];
  $alumno = $_POST['alumno'];
  $salon = $_POST['salon'];
  $curso = $_POST['curso'];
  $cantidad_solicitada = $_POST['cantidad_solicitada'];
  $herramienta = $_POST['herramienta'];

  $sql = "UPDATE pedidos SET  dia='$dia', profesor='$profesor', alumno='$alumno', salon='$salon', curso='$curso', cantidad_solicitada='$cantidad_solicitada', herramienta='$herramienta' WHERE id=$id";
  
  if (mysqli_query($conexion, $sql)) {
    echo "actualizacion exitosa.";
  } else {
    echo "ERROR: no se pudo ejecutar $sql. " . mysqli_error($conexion);
  }
  header('location: orders.php');
}

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $update = true;
  $registro = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id='$id'");
  if (mysqli_num_rows($registro) == 1) {
    $n = mysqli_fetch_array($registro);
    $id = $n['id'];
    $dia = $n['dia'];
    $profesor = $n['profesor'];
    $alumno = $n['alumno'];
    $salon = $n['salon'];
    $curso = $n['curso'];
    $cantidad_solicitada = $n['cantidad_solicitada'];
    $herramienta = $n['herramienta'];
  } else {
    echo ("ERROR: datos no autorizados");
  }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../assets/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

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

  <section class="form__section">
    <!-- Agregamos un contenedor para el mensaje de éxito -->
    <div id="mensajeExito" class="mensaje__exito"></div>

    <!-- Formulario de pedido -->
    <form id="pedidoForm" method="post" action="form_newOrders.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
          <legend class="input__title">Datos del Pedido</legend>
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <label for="dia">Día </label>
          <input id="dia" value="<?php echo $dia; ?>" name="dia" type="date" required>
          <label for="profesor">Profesor </label>
          <input type="text" class="input" value="<?php echo $profesor; ?>" id="profesor" name="profesor">
          <label for="alumno">Alumno</label>
          <input id="alumno" value="<?php echo $alumno; ?>" name="alumno" type="text" required>
          <label for="salon">Salón </label>
          <input id="salon" value="<?php echo $salon; ?>" name="salon" type="text" required>
          <label for="curso">Curso </label>
          <input id="curso" value="<?php echo $curso; ?>" name="curso" type="text" required>
          <label for="cantidad_solicitada">Cantidad Solicitada </label>
          <input id="cantidad_solicitada" value="<?php echo $cantidad_solicitada; ?>" name="cantidad_solicitada" type="number" required>
          <label for="herramienta">Herramienta </label>
          <input id="herramienta" value="<?php echo $herramienta; ?>" name="herramienta" type="text" required>
        </fieldset>
      <!-- Botones del formulario -->


      <div class="action__div">
      <div class="btn__container">
          <?php if ($update == true) : ?>
            <button class="btn__blue" type="submit" name="update">Editar</button>
          <?php else : ?>
            <button class="btn__blue" type="submit" name="add">Añadir</button>
          <?php endif ?>
        </div>
        <div class="btn__blue" id="btn_add">
          <p class="btn__blue--text">Agregar Herramienta</p>
        </div>
        
      </div>

    </form>
  </section>

  <!-- Script JavaScript para el formulario -->
  <script src="../assets/js/orders.js"></script>
  <script src="../assets/js/add_tool.js"></script>
</body>

</html>