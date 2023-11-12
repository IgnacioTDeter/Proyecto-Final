<?php
include('../php/connect_bd.php');
include('../php/checkPages.php');
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$result = mysqli_query($conexion, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Ahora $row contiene los datos del usuario.
} else {
    echo "No se encontraron datos para el ID proporcionado.";
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
  <title>Pañol - Usuarios</title>
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
    <li class="nav__item">
        <a href="orders.php" class="nav__link">Pedidos</a>
    </li>
    <li class="nav__item">
        <a href="inventory.php" class="nav__link">Inventario</a>
    </li>
    <?php
    $allowedRoles = ['admin', 'panol'];
    if (in_array($_SESSION['rol'], $allowedRoles)) {
        // El usuario tiene el rol de "admin" o "tobias", muestra la opción "Informes".
        echo '<li class="nav__item">
                <a href="reports.php" class="nav__link">Informes</a>
              </li>';
    }
    ?>
    <li class="nav__item">
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
    <!-- Agregamos un contenedor para el mensaje de éxito -->
    <div id="mensajeExito" class="mensaje__exito"></div>
    <!-- Formulario de pedido -->
    <form id="pedidoForm" method="post" action="../php/logic/logic_users/logic_edit_user.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>Datos de la herramienta</legend>
        <label for="nombre">Nombre de usuario</label>
        <input id="nombre" name="nombre" value="<?php echo $row['user_name'] ?>" maxlength="40" />
        <label for="rubro">Nueva Contraseña</label>
        <input id="newPassword" name="newPassword" required maxlength="40"/>
        <label for="gmail">gmail</label>
        <input type="email" name="gmail" value="<?php echo $row['gmail']?>">
        <label for="subrubro" >Rol</label>
        <select id="subrubro" name="rol" required>
            <option value="panol">Pañol</option>
            <option value="profesor">Profesor</option>
            <option value="admin">Admin</option>
        </select>
      </fieldset>

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <!-- Botones del formulario -->
      <input type="submit" class="btn__blue">
    </form>
  </section>