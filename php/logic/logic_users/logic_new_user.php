<?php
$conexion = mysqli_connect('localhost', 'panoluser', 'M27j*Vz3mPBb', 'panol');
// Agrega código para procesar el formulario aquí
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera los datos del formulario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];
    $gmail = $_POST['gmail'];



    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Realiza la inserción en la base de datos
    $sql = "INSERT INTO usuarios (user_name, password, rol, gmail) VALUES ('$nombre', '$hashed_password', '$rol', '$gmail')";

    if (mysqli_query($conexion, $sql)) {
        // Éxito al insertar el usuario
      
        echo "Usuario creado correctamente.";
        header("Location: ../../../pages/users.php");
    } 
    else {
        // Error al insertar el usuario
        echo "Error al crear el usuario: " . mysqli_error($conexion);
    }
}
?>