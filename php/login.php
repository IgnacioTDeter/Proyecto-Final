<?php
session_start();

include('connect_bd.php'); 

if (empty($_POST['user_name']) || empty($_POST['password'])) {
    echo json_encode('error_inputs');
} else {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $query_start = "SELECT * FROM usuarios WHERE user_name = BINARY '$user_name' AND password = BINARY '$password'";

    $query_start_validation = mysqli_query($conexion, $query_start);

    if (mysqli_num_rows($query_start_validation) == 0) {
        echo json_encode('error_user');
    } else {
        $start_validation = mysqli_query($conexion, $query_start);
        if ($start_validation) {
            $row = mysqli_fetch_assoc($start_validation);
            $_SESSION['user'] = $user_name;
            $_SESSION['rol'] = $row['rol']; // Obtén el rol de la base de datos y guárdalo en la variable de sesión
            echo json_encode('success');
        }
    }
}
