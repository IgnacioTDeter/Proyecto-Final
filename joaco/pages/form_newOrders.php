<?php
include("../php/connect_bd.php");
include("../php/form_loginc.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">
  <title>Pañol - Formulario de Pedidos</title>
</head>
<body>
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
    <div id="mensajeExito" class="mensaje__exito"></div>
    <form id="pedidoForm" method="post" action="../php/form_loginc.php">
      
      <fieldset id="fieldset" class="input__container">
        <legend class="input__title">Datos del Pedido</legend>
        <input type="hidden" name="id_pedido" value="<?php echo $id;?>">
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
      <div class="action__div">
        <div class="btn__container">
          <?php if ($update) : ?>
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
  <script src="../assets/js/orders.js"></script>
  <script src="../assets/js/add_tool.js"></script>
</body>
</html>
