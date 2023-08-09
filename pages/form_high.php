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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/css/style.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet"/>

    <link rel="shortcut icon" href="../assets/icons/logo.png" type="image/x-icon">

    <title>Pañol - Formulario de alta</title>
</head>
<body>

<form id="form" class="form">
        <div class="form_item">
            <label for="" class="label">Herramienta</label>
            <input type="text" class="input" name="herramienta">
        </div>

        <div class="form_item">
            <label for="" class="label">Cantidad</label>
            <input type="number" class="input" name="cantidad">
        </div>
        <div class="form_item">
            <label for="" class="label">Rubro</label>
            <input type="text" class="input" name="rubro">
        </div>
        <div class="form_item">
            <label for="" class="label">Sub-Rubro</label>
            <input type="text" class="input"name="sub_rubro">
        </div>
        <div class="form_item">
            <label for="" class="label">Proovedor</label>
            <input type="text" class="input" name="proveedor">
        </div>
        <div class="form_item">
            <label for="" class="label">Ubicación</label>
            <input type="text" class="input" name="ubicacion">
        </div>
        <div class="form_item">
            <input type="submit" class="input submit">
        </div>
    </form>

    <div class="pop_up" id="pop_up">
        <p id="msg"></p>
        <p class="btn_back" id="btn_back">Volver</p>
    </div>

    <div class="overlay" id="overlay"></div>

    <script src="../assets/js/form_high.js"></script>
    
</body>
</html>
