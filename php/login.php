<?php
session_start();

include('connect_bd.php'); 

if (empty($_POST['user_name']) || empty($_POST['password'])) {
    echo json_encode('error_inputs');
} else {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    $query_start = "SELECT * FROM usuarios WHERE user_name = '$user_name' AND password = '$password'";

    $query_user_name_validation = "SELECT * FROM usuarios WHERE user_name = BINARY '$user_name'";

    $user_name_validation = mysqli_query($conexion, $query_user_name_validation);

    if (mysqli_num_rows($user_name_validation) == 0) {
        echo json_encode('error_user_name');
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
