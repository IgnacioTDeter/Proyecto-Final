<?php
include("../php/connect_bd.php");
include('../php/checkPages.php');
include('../php/logic/logic_inventory/logic_Tool.php');
?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />



  <link rel="stylesheet" href="../assets/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../assets/icons/logo.svg" type="image/x-icon">

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
        <?php
    $allowedRoles = ['admin', 'panol'];
    if (in_array($_SESSION['rol'], $allowedRoles)) {
        // El usuario tiene el rol de "admin" o "tobias", muestra la opción "Informes".
        echo '<li class="nav__iteam">
        <a href="reports.php" class="nav__link">Informes</a>
      </li>';
    }
    
    $allowedRoles = ['admin'];
    if (in_array($_SESSION['rol'], $allowedRoles)){
      echo '<li class="nav__iteam">
      <a href="users.php" class="nav__link">usuarios</a>
    </li>';
    }
    
    ?>
       
        <li class="nav__iteam">
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
    <form id="pedidoForm" method="post" action="../php/form_uploadTool.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>Datos de la herramienta</legend>
        <label for="nombre">Nombre *</label>
        <input id="nombre" name="nombre" required maxlength="40"/>
        <label for="rubro">Rubro</label>
        <input id="rubro" name="rubro" required maxlength="40"/>
        <label for="subrubro">Sub-Rubro</label>
        <input id="subrubro" name="subrubro" required maxlength="40"/>
      </fieldset>


      <!-- Botones del formulario -->
      <input type="submit" class="btn__blue">
    </form>

  </section>


  <!-- ------------------------------------------ -->
  <!-- Script JavaScript para el formulario -->
  <script src="../assets/js/orders.js"></script>
  <script src="../assets/js/header.js"></script>
</body>

</html>