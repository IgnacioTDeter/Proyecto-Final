<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Document</title>
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
 <?php

$sql = "SELECT profesor, curso, fecha, texto, id FROM informes";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Genera el HTML para cada informe
        echo '<section class="inform__section">';
        echo '<div class="card__inform card">';
        echo '<div class="info__inform">';
        echo '<h2 class="title__inform">Profesor: ' . $row['profesor'] . '</h2>';
        echo '<h3 class="curso__inform">' . $row['curso'] . '</h3>';
        echo '<h4 class="curso__inform">' . $row['fecha'] . '</h4>';
        echo '</div>';
        echo '<div class="div__inform">';
        echo '<p class="paragraph__inform">Informe:</p>';
        echo '<div class="text__inform">';
        echo '<p>' . $row['texto'] . '</p>';
        echo '<div>';
        echo '<a href="../php/deleteReport.php?id_informe=' . $row['id'] . '"><button class="btn__blue-red">Borrar</button></a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
} else {
    echo "No se encontraron informes.";
}

// Cierra la conexión a la base de datos
$conexion->close();
?>

<script src="../assets/js/header.js"></script>

</body>
</html>