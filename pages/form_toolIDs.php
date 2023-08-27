<!DOCTYPE html>
<html lang="es">
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />



    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title> Pañol - Formulario de Pedidos </title>

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
    <section class="form__section">
    <!-- Agregamos un contenedor para el mensaje de éxito -->
    <div id="mensajeExito" class="mensaje__exito"></div>

    <!-- Formulario de pedido -->
    <form id="toolIDsForm" method="post" action="process_toolIDs.php">
      <!-- Datos de la herramienta -->
      <fieldset class="input__container">
        <legend>ID de cada herramienta</legend>

            <?php
            $nombre = $_GET['nombre'];
            $cantidad = intval($_GET['cantidad']);

            for ($i = 1; $i <= $cantidad; $i++) {
                echo '<label class="hola" for="toolID' . $i . '">ID de ' . $nombre . ' ' . $i . '</label>';
                echo '<input class="hola" id="toolID' . $i . '" name="toolID' . $i . '" required />';
            }
            ?>
            <button type="submit" class="btn__blue">Guardar</button>
        </form>

  <!-- </section>
    <section class="form__section">
        <form id="toolIDsForm" method="post" action="process_toolIDs.php">
            <?php
            $nombre = $_GET['nombre'];
            $cantidad = intval($_GET['cantidad']);

            for ($i = 1; $i <= $cantidad; $i++) {
                echo '<label class="hola" for="toolID' . $i . '">ID de ' . $nombre . ' ' . $i . '</label>';
                echo '<input class="hola" id="toolID' . $i . '" name="toolID' . $i . '" required />';
            }
            ?>
            <button type="submit" class="btn__blue">Guardar</button>
        </form>
    </section> -->

    <!-- ... (Script JavaScript y otros elementos) ... -->
</body>

</html>