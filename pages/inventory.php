<?php

session_start();

if(!isset($_SESSION['user'])) {

  echo '<script>
    alert("Debes iniciar sesión para acceder");
    window.location = "../index.html";
  </script>';

  
  session_destroy();
  die();
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>
    
    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">


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
            <a href="orders.php" class="nav__link">Pedidos</a>
          </li>
          <li class="nav__iteam">
            <a href="inventory.php" class="nav__link">Inventario</a>
          </li>
          <li class="nav__iteam">
            <a href="form_high.php" class="nav__link">Dar de alta</a>
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
    

    <h1 class="inventario_title">Inventario</h1>

    <section class="section__search">
      
        <div class="search__container">
          <input type="text" class="search__input" placeholder="Buscar..." />
          <button class="search__button">Buscar</button>
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
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Conexión a la base de datos
                  $servername = "localhost";
                  $username = "root";
                  $password = "";
                  $dbname = "tec1";

                  $conn = new mysqli($servername, $username, $password, $dbname);

                  // Verificar la conexión
                  if ($conn->connect_error) {
                      die("Error de conexión: " . $conn->connect_error);
                  }

                  // Consulta SQL para obtener los datos del inventario
                  $sql = "SELECT herramienta, cantidad, rubro, sub_rubro, proveedor, ubicacion FROM Inventario";
                  $result = $conn->query($sql);

                  // Mostrar los datos del inventario en la tabla
                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          echo "<tr class='tr'>";
                          echo "<td class='table_cell table_cell-0'>" . $row["herramienta"] . "</td>";
                          echo "<td class='table__cell'>" . $row["cantidad"] . "</td>";
                          echo "<td class='table__cell'>" . $row["rubro"] . "</td>";
                          echo "<td class='table__cell'>" . $row["sub_rubro"] . "</td>";
                          echo "<td class='table__cell'>" . $row["proveedor"] . "</td>";
                          echo "<td class='table__cell'>" . $row["ubicacion"] . "</td>";
                          echo "</tr>";
                      }
                  } else {
                      echo "<tr class='tr'>";
                      echo "<td colspan='6'>No hay herramientas disponibles en el inventario.</td>";
                      echo "</tr>";
                  }

                  $conn->close();
                  ?>
                </tbody>
              </table>
              
        </div>
      </section>
</body>
</html>
