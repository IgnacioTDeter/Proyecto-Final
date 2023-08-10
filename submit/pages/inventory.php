<?php
include('../php/connect_bd.php');



// session_start();

// if (!isset($_SESSION['user'])) {

//   echo '<script>
//     alert("Debes iniciar sesión para acceder");
//     window.location = "../index.html";
//   </script>';


//   session_destroy();
//   die();
// }

if (isset($_GET['enviar'])) {
  $busqueda = $_GET['search'];

  if (!empty($busqueda)) {
    $busqueda = '%' . $conexion->real_escape_string($busqueda) . '%'; // Sanitizar la entrada
    $sql = "SELECT * FROM Inventario 
    WHERE herramienta LIKE '" . $busqueda . "'";
  } else {
    $sql = "SELECT * FROM Inventario";
  }
} else {
  $sql = "SELECT * FROM inventario";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">


  <title>Pañol - Inventario</title>
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


  <section class="section__pedidos">
    <div class="title__pedidos">
      <h1 class="pedidos__title">Inventario</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
        <button class="add__btn">
          <a href="form_newTool.php" class="add__btn__a">
            <i class="ri-add-circle-fill"></i>
            Añadir
          </a>
        </button>
      </div>

      <form method="GET" action="inventory.php">
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
            <th class="table__header-item">Herramienta</th>
            <th class="table__header-item">Cantidad</th>
            <th class="table__header-item">Rubro</th>
            <th class="table__header-item">Sub-Rubro</th>
            <th class="table__header-item">Proveedor</th>
            <th class="table__header-item">Ubicacion</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $orders = mysqli_query($conexion, $sql);
          while ($row = mysqli_fetch_assoc($orders)) {
            echo '<tr class="tr">';
            echo '<td class="table__cell table__cell-0">' . $row['herramienta'] . '</td>';
            echo '<td class="table__cell">' . $row['cantidad'] . '</td>';
            echo '<td class="table__cell">' . $row['rubro'] . '</td>';
            echo '<td class="table__cell">' . $row['sub_rubro'] . '</td>';
            echo '<td class="table__cell">' . $row['proveedor'] . '</td>';
            echo '<td class="table__cell">' . $row['ubicacion'] . '</td>';
            echo '</tr>';
          }
          mysqli_free_result($orders);
          ?>
        </tbody>
      </table>

    </div>
  </section>

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
</body>

</html>