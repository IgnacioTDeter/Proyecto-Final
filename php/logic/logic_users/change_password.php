<?php
$conexion = mysqli_connect('localhost', 'root', '', 'tec1');
session_start(); // Inicia la sesión

         

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
  
} else {
  
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos del formulario
    
    $password_1 = $_POST['password_1'];
    $password_2 = $_POST['password_2'];
    
    if($password_1 == $password_2 ){

        // Genera el hash de la contraseña
        $hashed_password = password_hash($password_1, PASSWORD_DEFAULT);

        // Realiza la inserción en la base de datos
        $sql = "UPDATE usuarios SET password = '$hashed_password' WHERE gmail = '$email'";


        if (mysqli_query($conexion, $sql)) {
            // Éxito al insertar el usuario
            echo ('<script>
            
            alert("1");
            </script>');

            header('Location: /Proyecto-Final/index.php');
            exit;
        
        } 
        else {
            // Error al insertar el usuario
            echo ('<script>
            
            alert("2");
            </script>');
        }
    }else
    {
            echo ('<script>
            
            alert("ambas contraseñas deben ser iguales");
            </script>');
    }

    
}


?>