<?php

include('../php/connect_bd.php');
include('../php/checkPages.php');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
 

    $nombre = $_GET['nombre'];
    $cantidad = $_GET['cantidad'];
    $rubro = $_GET['rubro'];
    $subrubro = $_GET['subrubro'];
    $proveedor = $_GET['proveedor'];
    $ubicacion = $_GET['ubicacion'];


    $sql = "INSERT INTO inventario (herramienta, cantidad, rubro, sub_rubro, proveedor, ubicacion)
        VALUES ('$nombre', $cantidad, '$rubro', '$subrubro', '$proveedor', '$ubicacion')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
    echo "Los datos se han insertado correctamente.";
    } else {
    echo "Error al insertar los datos: " . $conexion->error;
    }

    $toolName = $nombre;

    $idSql = "SELECT id
    FROM inventario
    ORDER BY id DESC
    LIMIT 1;
    ";

$resultIdSql = $conexion->query($idSql); // Ejecutar la consulta

if ($resultIdSql) {
    $row = $resultIdSql->fetch_assoc();
    $lastId = $row['id']; // Obtener el último ID de la tabla inventario
} else {
    echo "Error al obtener el último ID: " . $conexion->error;
}

for ($i = 1; $i <= $cantidad; $i++) {
    $toolID = $_POST['toolID' . $i];
    echo "toolID: $toolID"; // Agrega esta línea para depurar
    // Consulta para verificar si ya existe un registro con el mismo id_detalle
    $existingQuery = "SELECT id FROM detalles_inventario WHERE id = $toolID";
    $existingResult = mysqli_query($conexion, $existingQuery);

    if (mysqli_num_rows($existingResult) > 0) {
        echo "Ya existe un registro con el mismo id_detalle: $toolID";
    } else {
        // Inserta el nuevo registro
        $query = "INSERT INTO detalles_inventario (id_stock, id_herramienta) VALUES ($lastId, $toolID)";
        $result = mysqli_query($conexion, $query);

        if (!$result) {
            echo "Error al insertar en la base de datos: " . mysqli_error($conexion);
        }
    }
}
}
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
                <img class="hero__logo-img"
                    src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
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
            <img class="hero__logo-img"
                src="https://avatars.githubusercontent.com/u/6693385?s=200&v=4" alt="logo" />
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
</body>

</html>
