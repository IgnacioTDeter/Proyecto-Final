<?php
// Conectarse a la base de datos y realizar las acciones necesarias para guardar los IDs



for ($i = 1; $i <= $cantidad; $i++) {
    $toolID = $_POST['toolID'.$i];
    // Realizar acciones con el ID (guardar en la base de datos, por ejemplo)
}

// Redirigir a la página de éxito o a donde desees
header("Location: /inventory.php");
exit();
?>