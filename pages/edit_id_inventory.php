<?php

include('../php/connect_bd.php');
include('../php/checkPages.php');
include('../php/logic/logic_inventory/logic_stateTool.php');

$id = $_GET['id'];
$sql = "SELECT * FROM detalles_inventario WHERE id_stock = '$id'";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">
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
                <img class="hero__logo-img" src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4"
                    alt="logo" />
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
        <div id="mensajeExito" class="mensaje__exito"></div>
        <form id="toolIDsForm" method="post">
            <fieldset class="input__container">
                <legend>ID de cada herramienta</legend>
                <!-- <?php
                $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
                $cantidad = isset($_GET['cantidad']) ? intval($_GET['cantidad']) : 0;

                for ($i = 1; $i <= $cantidad; $i++) {
                    echo '<label class="input__label" for="toolID' . $i . '">ID de ' . htmlspecialchars($nombre) . ' ' . $i . '</label>';
                    echo '<input class="input__field" id="toolID' . $i . '" name="toolID' . $i . '" required />';

                }
                ?> -->

                <?php

                $sql_result = mysqli_query($conexion, $sql);

                while ($row = mysqli_fetch_assoc($sql_result)) {
                    ?>
                    <p>Herramienta
                        <?php echo $row['id'] ?>
                    </p>

                    <label class="input__label" for="toolID">
                        <input class="input__field" id="toolID" value="<?php echo $row['id_herramienta'] ?>">
                        <div class="form__inventory">
                        <form action="../php/logic/logic_inventory/logic_stateTool.php" method="post">
                        </form>
                        
                        <form action="../php/logic/logic_inventory/logic_stateTool.php" method="post">
                            <input type="hidden" name="id_herramienta" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="nuevo_estado" value="Baja">
                            <button type="submit" name="boton" class="btn__blue"
                                style="background-color: rgb(179, 0, 0)">Dar de baja</button>
                        </form>
                        
                        <form action="../php/logic/logic_inventory/logic_stateTool.php" method="post">
                            <input type="hidden" name="id_herramienta" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="nuevo_estado" value="Desgastada">
                            <button type="submit" name="boton" class="btn__blue"
                                style="background-color: rgb(252, 186, 3); margin-left:10px;">Desgastada</button>
                        </form>
                        <form action="../php/logic/logic_inventory/logic_stateTool.php" method="post">
                            <input type="hidden" name="id_herramienta" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="nuevo_estado" value="Funcional">
                            <button type="submit" name="boton" class="btn__blue"
                                style="background-color: rgb(154, 212, 11); margin-left:10px;">Funcional</button>
                        </form>
                        </div>

                   

                        <?php
                }
                mysqli_free_result($sql_result);
                ?>
                    <br>
                    <button type="submit" class="btn__blue">Guardar</button>
            </fieldset>
        </form>
    </section>
    <!-- Agrega aquí tu JavaScript para manejar mensajes de éxito/fracaso -->




</body>

</html>