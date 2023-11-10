<?php

include('../php/connect_bd.php');
include('../php/checkPages.php');
include('../php/logic/logic_inventory/logic_stateTool.php');

$id = $_GET['id'];
$sql = "SELECT * FROM detalles_inventario WHERE id_stock = '$id'";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewpo  rt" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/icons/logo.svg" type="image/x-icon">
    <title>Pañol - Añadir herramienta</title>
</head>

<body>
<header class="hero">
    <input type="checkbox" id="nav__check" hidden />
    <label for="nav__check" class="hamburger">
      <i class="ri-menu-line hamburger__icon"></i>
    </label>
    <nav class="nav">
      <div class="hero__logo hero__logo-1">
        <img class="hero__logo-img" src="../assets/icons/logo.svg" alt="logo" />
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
      <img class="hero__logo-img" src="../assets/icons/logo.svg" alt="logo" />
      <h2 class="title__hero">Pañol</h2>
    </div>
  </header>
    <section class="form__section">
        <fieldset class="input__container">
            <legend>Seleccione cuantas herramientas agregar</legend>
            <label for="cantidad">Cantidad *</label>
            <input id="cantidad" name="cantidad" required />
        </fieldset>

        <button type="button" class="btn__blue" id="nextButton">Siguiente</button>

    </section>
    <!-- Agrega aquí tu JavaScript para manejar mensajes de éxito/fracaso -->

    <script>
        document.getElementById("nextButton").addEventListener("click", function () {
            const cantidad = parseInt(document.getElementById("cantidad").value);

            // Obtener el valor de 'id' desde PHP
            const id = "<?php echo $id; ?>";

            // Redirigir a la página de ingreso de IDs con los parámetros "cantidad" y "id"
            window.location.href = "form_addTool.php?cantidad=" + cantidad + "&id=" + id;
        });

    </script>
        <script src="../assets/js/header.js"></script>

</body>

</html>