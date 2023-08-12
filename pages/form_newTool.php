<?php
include("../php/connect_bd.php");

session_start();

if (!isset($_SESSION['user'])) {

  echo '<script>
    alert("Debes iniciar sesión para acceder");
    window.location = "../index.php";
  </script>';


  session_destroy();
  die();

if (isset($_POST['nombre'], $_POST['cantidad'], $_POST['proveedor'], $_POST['ubicacion'], $_POST['rubro'], $_POST['subrubro'])) {
    $nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
    $rubro = isset($_POST['rubro']) ? $_POST['rubro'] : null;
    $subrubro = isset($_POST['subrubro']) ? $_POST['subrubro'] : null;
    $proveedor = $_POST['proveedor'];
    $ubicacion = $_POST['ubicacion'];

    $query_pedido = "INSERT INTO inventario (herramienta, cantidad, rubro, sub_rubro, proveedor, ubicacion)
                     VALUES ('$nombre', '$cantidad', '$rubro', '$subrubro', '$proveedor', '$ubicacion')";

    if ($conexion->query($query_pedido)) {
        header("location: form_newTool.php");
    } else {
        echo json_encode('error_database');
    }

    $conexion->close();
} 
?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  

    <link rel="stylesheet" href="../assets/css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title> Pañol - Formulario de Pedidos </title>

  </head>
  <body>
    <!-- Encabezado -->
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

    <!-- Contenido principal -->
    <section class="form__section">
      <!-- Agregamos un contenedor para el mensaje de éxito -->
      <div id="mensajeExito" class="mensaje__exito"></div>

      <!-- Formulario de pedido -->
      <form id="pedidoForm" method="post" action="form_newTool.php" >
        <!-- Datos de la herramienta -->
        <fieldset class="input__container">
          <legend>Datos de la nueva herramienta</legend>
          <label for="nombre">Nombre *</label>
          <input  id="nombre" name="nombre" required/>
          <label for="cantidad">Cantidad *</label>
          <input id="cantidad" name="cantidad" required/>
          <label for="rubro">Rubro</label>
          <input  id="rubro" name="rubro"/>
          <label for="subrubro">Sub-Rubro</label>
          <input  id="subrubro" name="subrubro"  />
          <label for="proveedor">Proveedor *</label>
          <input  id="proveedor" name="proveedor" required/>
          <label for="ubicacion">Ubicacion *</label>
          <input  id="ubicacion" name="ubicacion" required/>
        </fieldset>

        
        <!-- Botones del formulario -->
        <button type="submit" class="btn-enviar">Enviar</button>
      </form>
    </section>

    <!-- Script JavaScript para el formulario -->
    <script src="../assets/js/orders.js"></script>
  </body>
</html>
