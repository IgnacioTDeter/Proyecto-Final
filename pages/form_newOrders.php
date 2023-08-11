<?php
include("../php/connect_bd.php");

if (isset($_POST['dia'], $_POST['profesor'], $_POST['alumno'], $_POST['salon'], $_POST['curso'], $_POST['cantidad_solicitada'], $_POST['herramienta'])) {
    $dia = $_POST['dia'];
    $profesor = $_POST['profesor'];
    $alumno = $_POST['alumno'];
    $salon = $_POST['salon'];
    $curso = $_POST['curso'];
    $cantidad_solicitada = $_POST['cantidad_solicitada'];
    $herramienta = $_POST['herramienta'];

    $query_pedido = "INSERT INTO pedidos (dia, profesor, alumno, salon, curso, cantidad_solicitada, herramienta)
    VALUES ('$dia', '$profesor', '$alumno', '$salon', '$curso', '$cantidad_solicitada', '$herramienta')";

    if ($conexion->query($query_pedido)) {
        header("location: orders.php");
    } else {
        echo json_encode('error_database');
    }

    $conexion->close();
} 
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
      <!-- Agregamos un contenedor para el mensaje de éxito -->
      <div id="mensajeExito" class="mensaje-exito"></div>

      <!-- Formulario de pedido -->
      <form id="pedidoForm" method="post" action="form_newOrders.php" >
        <!-- Datos de la herramienta -->
        <fieldset id="fieldset">
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
        <label for="cantidad_solicitada">Cantidad Solicitada </label>
        <input id="cantidad_solicitada" name="cantidad_solicitada" type="number" required>
        <label for="herramienta">Herramienta </label>
        <input id="herramienta" name="herramienta" type="text" required>
      </fieldset>


        
        <!-- Botones del formulario -->
        <button type="submit" class="btn-enviar">Enviar</button>
        <div class="add__btn" id="btn_add">Agregar herramienta</div>
      </form>
    </main>

    <!-- Script JavaScript para el formulario -->
    <script src="../assets/js/orders.js"></script>
       <script src="../assets/js/add_tool.js"></script>
  </body>
</html>
