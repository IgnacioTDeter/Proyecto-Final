<?php

session_start();

include('connect_bd.php');


if(empty($_POST['user_name']) || empty($_POST['user_password'])) {
    echo json_encode('error_inputs');
} else {
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    $query_start = "SELECT * FROM users WHERE user_name = '$user_name' AND $user_password = '$user_password'";

    $query_user_name_validation = "SELECT * FROM users WHERE user_name = BINARY '$user_name'";

    $user_name_validation = mysqli_query($conexion, $query_user_name_validation);

    $query_user_password_validation = "SELECT * FROM users WHERE user_password = BINARY '$user_password'";

    $user_password_validation = mysqli_query($conexion, $query_user_password_validation);


    if(mysqli_num_rows($user_name_validation) == 0) {
        echo json_encode('error_user_name');
    } else if (mysqli_num_rows($user_password_validation) == 0) {
        echo json_encode('error_user_password');
    } else {

        $start_validation = mysqli_query($conexion, $query_start);

        if($start_validation) {
            $_SESSION['user'] = $user_name;
            echo json_encode('success');
        }
    }

}