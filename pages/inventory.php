<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');
include('../php/search/search_inventory.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../assets/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

  <link rel="shortcut icon" href="../assets/icons/logo.svg" type="image/x-icon">


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




  

  <section class="section__pedidos">
    <div class="title__section">
      <h1 class="section__title">Inventario</h1>
    </div>
    <div class="action__div">
      <div class="add__div">
        <?php 
        $allowedRoles = ['admin', 'panol'];
        if (in_array($_SESSION['rol'], $allowedRoles)) {
          // El usuario tiene el rol de "admin", muestra el botón.
          echo '<a href="form_newTool.php" class="btn__blue--text">
                    <button class="btn__blue">
                      <i class="ri-add-circle-fill"></i>
                      Añadir 
                    </button>
                  </a>';
        } else {
          // El usuario no tiene el rol de "admin", no muestra nada.
          // Puedes agregar un mensaje o contenido alternativo si lo deseas.
        }
        ?>
        <?php
$allowedRoles = ['admin'];
if (in_array($_SESSION['rol'], $allowedRoles)) {
  // El usuario tiene el rol de "admin", muestra el botón.
  echo '<a href="form_uploadTool.php" class="btn__blue--text">
            <button class="btn__blue">
              <i class="ri-add-circle-fill"></i>
              Añadir Herramienta
            </button>
          </a>';
} else {
  // El usuario no tiene el rol de "admin", no muestra nada.
  // Puedes agregar un mensaje o contenido alternativo si lo deseas.
}
?>
</div>

      <form method="GET" action="inventory.php">
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
      <th class="table__header-item">Herramienta</th>
      <th class="table__header-item">Cantidad</th>
      <th class="table__header-item">Rubro</th>
      <th class="table__header-item">Sub-Rubro</th>
      <th class="table__header-item">Proveedor</th>
      <th class="table__header-item">Ubicacion</th>
      <th class="table__header-item">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $orders = mysqli_query($conexion, $sql);
    while ($row = mysqli_fetch_assoc($orders)) {
    ?>
      <tr class="tr">
        <td class="table__cell table_cell-0"><?php echo $row['herramienta']; ?></td>
        <td class="table__cell"><?php echo $row['cantidad']; ?></td>
        <td class="table__cell"><?php echo $row['rubro']; ?></td>
        <td class="table__cell"><?php echo $row['sub_rubro']; ?></td>
        <td class="table__cell"><?php echo $row['proveedor']; ?></td>
        <td class="table__cell"><?php echo $row['ubicacion']; ?></td>
        <td class="table__cell">
        <div class="btn-group">
    <!-- Botones de estado -->
 <?php
$allowedRoles = ['admin', 'panol'];
if(in_array($_SESSION['rol'], $allowedRoles)){
echo '<a href="tools_id_inventory.php?id=' . $row['id'] . '" class="btn__table btn__table-blue"><i class="ri-eye-fill"></i></a>';
echo '<a href="edit_id_inventory.php?id=' . $row['id'] . '" class="btn__table btn__table-yellow" ><i class="ri-pencil-fill"></i></a>';
echo '<a href="addTool.php?id=' . $row['id'] . '" class="btn__table btn__table-blue"><i class="ri-add-line"></i></a>';
echo '<a href="../php/deleteTool.php?id_herramienta=' . $row['id'] . '" class="btn__table btn__table-red delete-button" delete-id="' . $row['id'] . '" id="deleteOrder"><i class="ri-close-circle-fill"></i></a>';
}
else{
echo '<a href="#" class="btn__table btn__table-blue" style="background-color: #CCCCCC"><i class="ri-eye-fill"></i></a>';
echo '<a href="#" class="btn__table btn__table-yellow" style="background-color: #CCCCCC"><i class="ri-pencil-fill"></i></a>';
echo '<a href="#" class="btn__table btn__table-blue" style="background-color: #CCCCCC"><i class="ri-add-line"></i></a>';
}

?>

</div>

              </td>
        </td>
      </tr>
    <?php
    }
    mysqli_free_result($orders);
    ?>
  </tbody>
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
  <script>
// Obtén todos los botones de eliminación por su clase
var deleteButtons = document.querySelectorAll(".delete-button");

// Agrega un controlador de eventos a cada botón de eliminación
deleteButtons.forEach(function (button) {
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Evita que el enlace se siga inmediatamente

    // Muestra un cuadro de diálogo de confirmación
    var result = confirm("¿Estás seguro de que deseas eliminar este pedido?");

    // Si el usuario confirma, redirige al script de eliminación PHP
    if (result) {
      window.location.href = button.getAttribute("href");
    } else {
      // El usuario canceló la eliminación, no hagas nada
    }
  });
});
</script>

</body>

</html>
