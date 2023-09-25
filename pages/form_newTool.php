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
    <form id="pedidoForm" method="post" action="form_newTool.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>Datos de la nueva herramienta</legend>
        <label for="nombre">Nombre *</label>
        <?php
        // Primera etiqueta select
        echo '<select id="nombre" name="nombre" required>';
        echo '<option value=""></option>';

        // Consultar la base de datos para obtener las opciones
        $sql = "SELECT id, herramienta FROM formulario_herramientas";
        $result = $conexion->query($sql);

        // Mostrar las opciones en el select
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["herramienta"] . "'>" . $row["herramienta"] . "</option>";
          }
        }

        // Cierre de la primera etiqueta select
        echo '</select>';

        // Labels e inputs
        echo '<label for="cantidad">Cantidad *</label>';
        echo '<input id="cantidad" name="cantidad" required />';

        // Segunda etiqueta select
        echo '<label for="rubro">Rubro</label>';
        echo '<select id="rubro" name="rubro" required>';
        echo '<option value=""></option>';

        // Consultar la base de datos para obtener las opciones
        $sql = "SELECT DISTINCT rubro FROM formulario_herramientas";
        $result = $conexion->query($sql);

        // Mostrar las opciones en el select
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["rubro"] . "'>" . $row["rubro"] . "</option>";
          }
        }

        // Cierre de la segunda etiqueta select
        echo '</select>';

        // Labels e inputs
        echo '<label for="subrubro">Sub-Rubro</label>';
        echo '<select id="subrubro" name="subrubro" required>';
        echo '<option value=""></option>';

        // Consultar la base de datos para obtener las opciones
        $sql = "SELECT DISTINCT sub_rubro FROM formulario_herramientas";
        $result = $conexion->query($sql);

        // Mostrar las opciones en el select
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["sub_rubro"] . "'>" . $row["sub_rubro"] . "</option>";
          }
        }

        // Cierre de la tercera etiqueta select
        echo '</select>';
        ?>

        <label for="proveedor">Proveedor *</label>
        <input id="proveedor" name="proveedor" required />
        <label for="ubicacion">Ubicación *</label>
        <input id="ubicacion" name="ubicacion" required />
      </fieldset>

      <!-- Botones del formulario -->
      <button type="button" class="btn__blue" id="nextButton">Siguiente</button>
    </form>
  </section>

  <!-- ------------------------------------------ -->

  <script>
  document.getElementById("nextButton").addEventListener("click", function () {
  const nombre = document.getElementById("nombre").value;
  const cantidad = parseInt(document.getElementById("cantidad").value);
  const rubro = document.getElementById("rubro").value;
  const subrubro = document.getElementById("subrubro").value;
  const proveedor = document.getElementById("proveedor").value;
  const ubicacion = document.getElementById("ubicacion").value;

  // Actualizar el valor del option seleccionado
  document.getElementById("nombre").value = encodeURIComponent(nombre);

  window.location.href = "form_toolID.php?nombre=" + encodeURIComponent(nombre) + "&cantidad=" + cantidad + "&rubro=" + encodeURIComponent(rubro) + "&subrubro=" + encodeURIComponent(subrubro) + "&proveedor=" + encodeURIComponent(proveedor) + "&ubicacion=" + encodeURIComponent(ubicacion);
});

  </script>

  <!-- Script JavaScript para el formulario -->
  <script src="../assets/js/orders.js"></script>
</body>

</html>