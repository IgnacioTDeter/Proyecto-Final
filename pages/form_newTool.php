<?php
include("../php/connect_bd.php");

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
} else {
    echo json_encode('error_inputs');
}
?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../assets/css/orders.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title> Pañol - Formulario de Pedidos </title>

  </head>
  <body>
    <!-- Encabezado -->
    <header>
      <div class="logo">Logo Aquí</div>
      <div class="header-text">Formulario de Pedido</div>
      <div class="buttons">
        <!-- Botón para resetear el formulario -->
        <button class="btn-reset" onclick="resetForm()">
          <img src="../assets/svg/refrescar.svg" alt="Reset" />
        </button>

        <!-- Botón para cerrar o regresar al índice principal -->
        <button class="btn-close" onclick="redirectToIndex()">
          <img src="../assets/svg/salir.svg" alt="Cerrar" />
        </button>
      </div>
    </header>

    <!-- Contenido principal -->
    <main>
      <!-- Agregamos un contenedor para el mensaje de éxito -->
      <div id="mensajeExito" class="mensaje-exito"></div>

      <!-- Formulario de pedido -->
      <form id="pedidoForm" method="post" action="form_newTool.php" >
        <!-- Datos de la herramienta -->
        <fieldset>
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
    </main>

    <!-- Script JavaScript para el formulario -->
    <script src="../assets/js/orders.js"></script>
  </body>
</html>
