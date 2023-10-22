<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Generar una nueva contraseña
    $password = "123";
    $usuario = "Lemos";

    // Enviar la nueva contraseña por correo electrónico
    $asunto = "Recupera los datos de tu cuenta Pañol Institucional";
    $mensaje = "Haz enviado una solicitud para recuperar tus datos. 
    La cuenta asociada a este mail tiene las siguientes credenciales:
    Nombre de usuario:" . $usuario . "Contraseña:" . $password;
    $enviado = mail($email, $asunto, $mensaje, 'from: elhombremotorola@gmail.com');

    if ($enviado) {
        echo "Se ha enviado una nueva contraseña a tu correo electrónico.";
    } else {
        echo "Error al enviar la nueva contraseña. Por favor, inténtalo de nuevo.";
    }
}

?>
