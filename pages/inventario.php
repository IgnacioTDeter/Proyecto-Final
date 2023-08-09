<?php
include('../php/connect_bd.php');



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
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Formulario</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>

  <!-- header -->

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
          <a href="pedidos.php" class="nav__link">Pedidos</a>
        </li>
        <li class="nav__iteam">
          <a href="inventario.php" class="nav__link">Inventario</a>
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

  <!-- pedidos-invetario -->

  <section class="section__pedidos">
    <div class="title__pedidos">
      <h1 class="pedidos__title">Inventario</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
      </div>
      <form method="GET" action="inventario.php">
        <div class="search__container">
          <input name="search" type="search" class="search__input" placeholder="Buscar..." />
          <button class="search__button" type="submit" name="enviar">Buscar</button>
        </div>
      </form>
    </div>
  </section>

  <!-- tables -->

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
          ?>
            <tr class="tr">
              <td class="table__cell table__cell-0"><?php echo $row['herramienta']; ?></td>
              <td class="table__cell"><?php echo $row['cantidad']; ?></td>
              <td class="table__cell"><?php echo $row['rubro']; ?></td>
              <td class="table__cell"><?php echo $row['sub_rubro']; ?></td>
              <td class="table__cell"><?php echo $row['proveedor']; ?></td>
              <td class="table__cell"><?php echo $row['ubicacion']; ?></td>
            </tr>
          <?php
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
  
  <!-- JS -->
  <script src="../assets/js/header.js"></script>
  <script src="../assets/js/table.js"></script>
</body>

</html>