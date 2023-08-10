<?php
include('../php/connect_bd.php');

// session_start();

// if (!isset($_SESSION['user'])) {
//   echo '<script>
//     alert("Debes iniciar sesión para acceder");
//     window.location =  "../php/index.html";
//   </script>';

//   session_destroy();
//   die();
// }

if (isset($_GET['enviar'])) {
  $busqueda = $_GET['search'];

  if (!empty($busqueda)) {
    $busqueda = '%' . $conexion->real_escape_string($busqueda) . '%'; // Sanitizar la entrada
    $sql = "SELECT * FROM pedidos WHERE alumno LIKE '" . $busqueda . "'";
  } else {
    $sql = "SELECT * FROM pedidos";
  }
} else {
  $sql = "SELECT * FROM pedidos";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="../assets/css/style.css" />

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="shortcut icon" href="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" type="image/x-icon">

  <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">


  <title>Pañol - Pedidos</title>
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
          <a href="form_high.php" class="nav__link">Dar de alta</a>
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

  <section class="section__pedidos">
    <div class="title__pedidos">
      <h1 class="pedidos__title">Pedidos</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
        <button class="add__btn">
          <a href="form_newOrders.php" class="add__btn__a">
            <i class="ri-add-circle-fill"></i>
            Añadir
          </a>
        </button>
      </div>

      <form method="GET" action="orders.php">
        <div class="search__container">
          <input name="search" type="search" class="search__input" placeholder="Buscar..." />
          <button class="search__button" type="submit" name="enviar">Buscar</button>
        </div>
      </form>
    </div>
  </section>

  <section class="section__table">
    <div class="table__responsive">
      <table class="table">
        <thead class="table__header">
          <tr class="tr">
            <th class="table__header-item table__header-item-0">Dia</th>
            <th class="table__header-item">Profesor</th>
            <th class="table__header-item">Alumno</th>
            <th class="table__header-item" colspan="2">Datos</th>
            <th class="table__header-item">Acciones</th>
          </tr>
        </thead>

        <?php
        $orders = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($orders) > 0) {
          while ($row = mysqli_fetch_assoc($orders)) {
            echo '<tr class="tr">';
            echo '<td class="table__cell table__cell-0">' . $row['dia'] . '</td>';
            echo '<td class="table__cell">' . $row['profesor'] . '</td>';
            echo '<td class="table__cell">' . $row['alumno'] . '</td>';
            echo '<td class="table__cell">' . $row['salon'] . '</td>';
            echo '<td class="table__cell">' . $row['curso'] . '</td>';
            echo '<td class="table__cell">';
            echo '<a href="#" class="btn__table btn__table-blue"><i class="ri-eye-fill"></i></a>';
            echo '<a href="#" class="btn__table btn__table-yellow"><i class="ri-pencil-fill"></i></a>';
            echo '<a href="#" class="btn__table btn__table-red"><i class="ri-close-circle-fill"></i></a>';
            echo '</td>';
            echo '</tr>';
          }
        } else {
          echo '<tr class="no-results-row"><td colspan="6">No se encontraron valores.</td></tr>'; //agregar estilos
        }

        mysqli_free_result($orders);
        ?>
      </table>
    </div>
    <div class="pagination">
      <button class="pagination__button" onclick="previousPage()" id="btnPrevious">
        <i class="ri-arrow-left-s-line"></i>
      </button>
      <span id="pageNumbers"></span>
      <button class="pagination__button" onclick="nextPage()" id="btnNext">
        <i class="ri-arrow-right-s-line"></i>
      </button>
    </div>
  </section>
  <script src="./assets/js/header.js"></script>
  <script src="./assets/js/table.js"></script>
</body>

</html