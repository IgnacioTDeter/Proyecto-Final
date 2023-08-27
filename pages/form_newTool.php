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
  <section class="form__section">
    <!-- Agregamos un contenedor para el mensaje de éxito -->
    <div id="mensajeExito" class="mensaje__exito"></div>

    <!-- Formulario de pedido -->
    <form id="pedidoForm" method="post" action="form_newTool.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>Datos de la nueva herramienta</legend>
        <label for="nombre">Nombre *</label>
        <input id="nombre" name="nombre" required />
        <label for="cantidad">Cantidad *</label>
        <input id="cantidad" name="cantidad" required />
        <label for="rubro">Rubro</label>
        <input id="rubro" name="rubro" />
        <label for="subrubro">Sub-Rubro</label>
        <input id="subrubro" name="subrubro" />
        <label for="proveedor">Proveedor *</label>
        <input id="proveedor" name="proveedor" required />
        <label for="ubicacion">Ubicacion *</label>
        <input id="ubicacion" name="ubicacion" required />
      </fieldset>


      <!-- Botones del formulario -->
      <button type="submit" class="btn__blue">Enviar</button>
      <button type="button" class="btn__blue" id="nextButton">Siguiente</button>
    </form>

  </section>


  <!-- ------------------------------------------ -->

  <script>
    document.getElementById("nextButton").addEventListener("click", function() {
      const nombre = document.getElementById("nombre").value;
      const cantidad = parseInt(document.getElementById("cantidad").value);

      // Redirigir a la página de ingreso de IDs
      window.location.href = "form_toolIDs.php?nombre=" + encodeURIComponent(nombre) + "&cantidad=" + cantidad;
    });
  </script>


  <!-- Script JavaScript para el formulario -->
  <script src="../assets/js/orders.js"></script>
</body>

</html>