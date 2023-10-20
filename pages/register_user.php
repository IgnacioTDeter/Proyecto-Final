<?php
include("../php/connect_bd.php");
include('../php/checkPages.php');
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
        <li class="nav__item">
          <a href="orders.php" class="nav__link">Pedidos</a>
        </li>
        <li class="nav__item">
          <a href="inventory.php" class="nav__link">Inventario</a>
        </li>
        <li class="nav__item">
          <a href="../php/logout.php" class="nav__link">Cerrar sesión</a>
        </li>
      </ul>
    </nav>
    <div class="hero__logo hero__logo-0">
      <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
      <h2 class="title__hero">Pañol</h2>
    </div>
  </header>

  <!-- Contenido principal -->
  <section class="form__section">
    <!-- Agregamos un contenedor para el mensaje de éxito -->
    <div id="mensajeExito" class="mensaje__exito"></div>

    <!-- Formulario de pedido -->
    <form id="newUser" method="post" action="../php/logic/logic_users/logic_new_user.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>Crear nuevo usuario</legend>
        <label for="nombre">Nombre de usuario</label>
        <input id="nombre" name="nombre" required />

        <label for="password">Contraseña</label>
        <input id="password" name="password" required />

        <label for="rol">Rol</label>
        <select id="rol" name="rol" required>
            <option value="panol">Pañol</option>
            <option value="profesor">Profesor</option>
            <option value="admin">Admin</option>
        </select>

</fieldset>


      <!-- Botones del formulario -->
      <input type="submit" class="btn__blue">
    </form>
  </section>

  <!-- ------------------------------------------ -->


</body>

</html>