<?php

include('conexion.php');


if(empty($_POST['user_name']) || empty($_POST['user_email']) || empty($_POST['user_password'])) {
    echo json_encode('error_inputs');
} else {

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $query_register = "INSERT INTO users(user_name, user_email, user_password)VALUES('$user_name', '$user_email', '$user_password')";

    $query_user_name_validation = "SELECT * FROM  users WHERE user_name = '$user_name'";

    $user_name_validation = mysqli_query($conexion, $query_user_name_validation);

    $query_user_email_validation = "SELECT * FROM users WHERE user_email = '$user_email'";

    $user_email_validation = mysqli_query($conexion, $query_user_email_validation);

    if(mysqli_num_rows($user_name_validation) > 0 ) {
        echo json_encode('error_user_name');
    } else if (mysqli_num_rows($user_email_validation) > 0) {
        echo json_encode('error_user_email');
    } else {
        $register = mysqli_query($conexion, $query_register);

        if ($register) {
            echo json_encode('success');
        }
    }
}
