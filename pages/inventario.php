<?php
include('../php/connect_bd.php');

$query_orders = "SELECT * FROM pedidos";

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="hero">
      <input type="checkbox" id="nav__check" hidden />
      <label for="nav__check" class="hamburger">
        <i class="ri-menu-line hamburger__icon"></i>
      </label>
      <nav class="nav">
        <div class="hero__logo hero__logo-1">
          <img
            class="hero__logo-img"
            src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4"
            alt="logo"
          />
          <h2 class="title__hero">Pañol</h2>
          <label for="nav__check" class="hamburger">
            <i class="ri-menu-fold-line hamburger__icon"></i>
          </label>
        </div>
        <ul class="nav__list">
          <li class="nav__iteam">
            <a href="" class="nav__link">Pedidos</a>
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
        <img
          class="hero__logo-img"
          src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4"
          alt="logo"
        />
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
            <i class="ri-add-circle-fill"></i>
            <a href="../pages/pedidos.html">Añadir</a>
          </button>
        </div>

        <div class="search__container">
          <input type="text" class="search__input" placeholder="Buscar..." />
          <button class="search__button">Buscar</button>
        </div>
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
            $orders = mysqli_query($conexion, $query_orders);

            while($row = mysqli_fetch_assoc($orders)) {
              ?>
              <tr class="tr">
                <td class="table__cell table__cell-0"><?php echo $row['dia'];?></td>
                  <td class="table__cell"><?php echo $row['profesor'];?></td>
                  <td class="table__cell"><?php echo $row['alumno'];?></td>
                  <td class="table__cell"><?php echo $row['salon'];?></td>
                  <td class="table__cell"><?php echo $row['curso'];?></td>
                  <td class="table__cell">
                  <a href="#" class="btn__table btn__table-blue"><i class="ri-eye-fill"></i></a><a href="#" class="btn__table btn__table-yellow"><i class="ri-pencil-fill"></i></a><a href="#" class="btn__table btn__table-red"><i class="ri-close-circle-fill"></i></a>
                </td>
              </tr>
          <?php
            }
            mysqli_free_result($orders);
          ?>
        </table>
      </div>
      <div class="pagination">
        <button
          class="pagination__button"
          onclick="previousPage()"
          id="btnPrevious"
        >
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
</html>
