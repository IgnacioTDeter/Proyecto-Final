<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cantidad = $_GET['cantidad'];
    $id = $_GET['id'];

    for ($i = 1; $i <= $cantidad; $i++) {
        $id_herramienta = $_POST['toolID' . $i]; // Obtener el id_herramienta del formulario

        $sqlDetalles = "INSERT INTO detalles_inventario (id_stock, id_herramienta, estado)
            VALUES ('$id', '$id_herramienta', 'Funcional')";

        if ($conexion->query($sqlDetalles) !== TRUE) {
            echo "Error al insertar los datos: " . $conexion->error;
            exit(); // Si hay un error, detén la ejecución del script
        }
    }

    header("Location: inventory.php");
    exit(); // Asegúrate de que el script se detenga después de la redirección
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/icons/logo.svg" type="image/x-icon">
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
    <section class="form__section">
        <div id="mensajeExito" class="mensaje__exito"></div>
        <form id="toolIDsForm" method="post" >
            <fieldset class="input__container">
                <legend>ID de cada herramienta</legend>
                <?php
                $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
                $cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 0;

                for ($i = 1; $i <= $cantidad; $i++) {
                    echo '<label class="input__label" for="toolID' . $i . '">ID de ' . htmlspecialchars($nombre) . ' ' . $i . '</label>';
                    echo '<input class="input__field" id="toolID' . $i . '" name="toolID' . $i . '" required />';
                }
                ?>
                <button type="submit" class="btn__blue">Guardar</button>
            </fieldset>
        </form>
    </section>
    <!-- Agrega aquí tu JavaScript para manejar mensajes de éxito/fracaso -->
    <script src="../assets/js/header.js"></script>
</body>

</html>