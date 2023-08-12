<?php
include('../php/connect_bd.php');

session_start();

if (!isset($_SESSION['user'])) {

  echo '<script>
    alert("Debes iniciar sesión para acceder");
    window.location = "../index.php";
  </script>';


  session_destroy();
  die();

if (isset($_GET['enviar'])) {
  $busqueda = $_GET['search'];

  if (!empty($busqueda)) {
    $busqueda = '%' . $conexion->real_escape_string($busqueda) . '%'; // Sanitizar la entrada
    $sql = "SELECT * FROM pedidos 
    WHERE alumno LIKE '" . $busqueda . "'";
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
    <div class="title__section">
      <h1 class="section__title">Pedidos</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
        <button class="btn__blue">
          <a href="form_newOrders.php" class="btn__blue--text">
            <i class="ri-add-circle-fill"></i>
            Añadir
          </a>
        </button>
      </div>

      <form method="GET" action="orders.php">
        <div class="search__container">
          <input name="search" type="search" class="search__input" placeholder="Buscar..." />
          <button class="btn__blue" type="submit" name="enviar">
            <p class="btn__blue--text">Buscar</p>
          </button>
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
        while ($row = mysqli_fetch_assoc($orders)) {
          ?>
            <tr class="tr">
              <td class="table__cell table__cell-0"><?php echo $row['dia']; ?></td>
              <td class="table__cell"><?php echo $row['profesor']; ?></td>
              <td class="table__cell"><?php echo $row['alumno']; ?></td>
              <td class="table__cell"><?php echo $row['salon']; ?></td>
              <td class="table__cell"><?php echo $row['curso']; ?></td>
              <td class="table__cell">
                <a href="#" class="btn__table btn__table-blue"><i class="ri-eye-fill"></i></a>
                <a href="form_newOrders.php?edit=<?php echo $row['id']; ?>" class="btn__table btn__table-yellow"><i class="ri-pencil-fill"></i></a>
                <a href="#" class="btn__table btn__table-red"><i class="ri-close-circle-fill"></i></a>
              </td>
            </tr>
          <?php
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
  <script src="../assets/js/header.js"></script>
  <script src="../assets/js/table.js"></script>
</body>

</html>
