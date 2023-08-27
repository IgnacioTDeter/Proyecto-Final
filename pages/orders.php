<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');
include('../php/search/search_orders.php');
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
        <!-- Encabezado de la tabla -->
        <thead class="table__header">
          <tr class="tr">
            <th class="table__header-item table__header-item-0">Dia</th>
            <th class="table__header-item">Profesor</th>
            <th class="table__header-item">Alumno</th>
            <th class="table__header-item" colspan="2">Datos</th>
            <th class="table__header-item">Acciones</th>
          </tr>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($row = mysqli_fetch_assoc($orders)) {
            $rowId = $row['id_pedido']; // Obtener el id del pedido
          ?>
            <tr class="tr" data-row-id="<?php echo $rowId; ?>">
              <td class="table__cell table__cell-0">
                <?php echo $row['dia']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['profesor']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['alumno']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['salon']; ?>
              </td>
              <td class="table__cell">
                <?php echo $row['curso']; ?>
              </td>
              <td class="table__cell">
                <div class="btn-group">
                  <!-- Configurar el botón con el atributo data-row-id -->
                  <a href="#" class="btn__table btn__table-blue" data-row-id="<?php echo $rowId; ?>"><i class="ri-eye-fill"></i></a>
                  <a href="form_editOrders.php?edit=<?php echo $row['id_pedido']; ?>" class="btn__table btn__table-yellow"><i class="ri-pencil-fill"></i></a>
                  <a href="../php/deleteOrder.php?id_pedido=<?php echo $row['id_pedido']; ?>" class="btn__table btn__table-red" delete-id=<?php echo $rowId; ?> id="deleteOrder"><i class="ri-close-circle-fill"></i></a>
                </div>
              </td>
            </tr>

            <?php
            $sql_detalles = "SELECT * FROM detalles_pedidos WHERE id_pedido = $rowId";
            $detalles = mysqli_query($conexion, $sql_detalles);
            ?>

            <!-- Filas de detalles relacionadas a la fila principal -->
            <tr class="custom-dropdown-row table__header-item table__header-item-0" style="display: none;" data-row-id="<?php echo $rowId; ?>">
              <th class="" colspan="3" style="background-color: hsl(0, 0%, 25%); border: solid 1px grey">Herramienta</th>
              <th class="" colspan="3" style="background-color: hsl(0, 0%, 25%); border: solid 1px grey">Cantidad</th>
            </tr>


            <?php
            while ($row = mysqli_fetch_assoc($detalles)) {

            ?>
              <tr class="custom-dropdown-row" style="display: none;" data-row-id="<?php echo $rowId; ?>">
                <td colspan="3" class="table__cell" style="background-color: rgba(255, 255, 27, 0.470);">
                  <?php echo $row['herramienta']; ?>
                </td>
                <td colspan="3" class="table__cell" style="background-color: rgba(255, 255, 27, 0.470);">
                  <?php echo $row['cantidad_solicitada']; ?>
                </td>
              </tr>
            <?php
            }
            ?>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>


  <script src="../assets/js/data_into_orders.js"></script>
</body>

</html>
