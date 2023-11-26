<?php
session_start(); // Inicia la sesión

include('../../connect_bd.php');

if ($conexion->connect_error) {
    die("La conexión a la base de datos falló: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE gmail  = '$email'";
    $result = $conexion->query($sql);

    if ($result === false) {
        echo "Error en la consulta: " . $conexion->error;
    } elseif ($result->num_rows > 0) {
        $_SESSION['email'] = $email; // Almacena el valor de $email en la sesión

        $Asunto = "Cambio de contraseña";
        $mensaje = "
        <html>
        <head>
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
        
                .card {
                    background-color: #ffffff;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    max-width: 400px;
                    margin: 50px auto;
                    padding: 30px;
                    text-align: center;
                }
        
                .card p {
                    font-size: 16px;
                    color: #333333;
                    line-height: 1.6;
                    margin-bottom: 20px;
                }
        
                .btn_blue {
                    display: inline-block;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: center;
                    text-decoration: none;
                    
                    color: #ffffff;
                    padding: 10px 20px;
                    border-radius: 5px;
                    
                }
        
            </style>
        </head>
        <body>
        
        <div class=card>
            <p>Hola Usuario,</p>
            <p>Hemos recibido una solicitud para cambiar su contraseña. Haga clic en el siguiente enlace para continuar:</p>
            <a href='http://localhost/pruebas+/Proyecto-Final/new__password.php' class=btn_blue>Restablecer contraseña</a>
        </div>
        
        </body>
        </html>";

        $header = "From: tobiassuarez04@gmail.com\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        if (mail($email, $Asunto, $mensaje, $header)) {
            header('Location: ../../../index.php');
            exit;
        } else {
            // Manejo de errores de envío de correo electrónico
        }
    } else {
        // Resto del código en caso de que no se encuentren resultados en la consulta
    }
}

// Cerrar la conexión y otros códigos adicionales
?>
