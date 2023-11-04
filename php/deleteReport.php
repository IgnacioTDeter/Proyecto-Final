<?php
include('connect_bd.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_informe'])) {
    
    $id_informe = $_GET['id_informe'];
    $query_delete = "DELETE FROM informes WHERE id = '$id_informe'";

    $delete = mysqli_query($conexion, $query_delete);

    if ($delete) {
        header("Location: ../pages/reports.php");
        exit(); // Asegura que el script se detenga después de la redirección
    } else {
        echo '<script> 
            alert("Algo salió mal"); 
            window.history.go(-1);
        </script>';
    }
} else {
    // Si no se proporciona un ID de informe válido, redirige a la página de informes
    header("Location: ../pages/reports.php");
    exit();
}
?>