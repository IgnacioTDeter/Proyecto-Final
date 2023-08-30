<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');
include('../php/logic/logic_orders/logic_form_newOrders.php');
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../assets/css/orders.css">

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
            </div>
          </div>

          <button class="btn__blue" type="button" onclick="agregarHerramienta()">Agregar Herramienta</button><br><br>
          <input class="btn__blue" type="submit" value="Enviar Pedido">
          <div class="action__div">
          
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