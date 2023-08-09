<?php

session_start();

if(!isset($_SESSION['user'])) {

  echo '<script>
    alert("Debes iniciar sesión para acceder");
    window.location = "../index.php";
  </script>';

  
  session_destroy();
  die();
} 

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="../assets/css/stylecss">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title>Pañol - Formulario de Pedidos</title>
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
      <form id="pedidoForm" method="post" action="guardar_pedido.php" onsubmit="return validarFormulario()">
        <!-- Datos del Solicitante -->
        <fieldset>
          <legend>Datos del Solicitante</legend>
          <label for="dia">Día *</label>
          <input type="date" id="dia" name="dia" required />
          <label for="profesor">Profesor *</label>
          <input type="text" id="profesor" name="profesor" required />
          <label for="alumno">Alumno *</label>
          <input type="text" id="alumno" name="alumno" required />
          <label for="salon">Salón *</label>
          <input type="text" id="salon" name="salon" required />
          <label for="curso">Curso *</label>
          <input type="text" id="curso" name="curso" required />
        </fieldset>

        <!-- Datos del Pedido -->
        <fieldset>
          <legend>Datos del Pedido</legend>
          <label for="cantidad">Cantidad Solicitada *</label>
          <input type="number" id="cantidad" name="cantidad" min="1" required />

          <!-- Desplegable de herramientas -->
          <label for="herramienta">Herramienta *</label>
          <select id="herramienta" name="herramienta" required>
            <option value="">Seleccione una opción</option>
            <option value="Cinta métrica">Cinta métrica</option>
            <option value="Destornillador">Destornillador</option>
            <option value="Llave ajustable">Llave ajustable</option>
            <option value="Martillo">Martillo</option>
            <option value="Nivel de burbuja">Nivel de burbuja</option>
            <option value="Pala">Pala</option>
            <option value="Sierra eléctrica">Sierra eléctrica</option>
            <option value="Taladro inalámbrico">Taladro inalámbrico</option>
          </select>
        </fieldset>

        <!-- Botones del formulario -->
        <button type="submit" class="btn-enviar">Enviar</button>
      </form>
    </main>

    <!-- Script JavaScript para el formulario -->
    <script src="../assets/js/pedidos.js"></script>
  </body>
</html>
