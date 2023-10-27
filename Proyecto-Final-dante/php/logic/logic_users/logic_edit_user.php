    <?php

    $conexion = mysqli_connect('localhost', 'root', '', 'tec1');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica si se ha enviado un formulario mediante POST.

        // Recupera el valor ingresado en el campo "Nueva Contraseña".
        $nuevaContraseña = $_POST['newPassword'];

        // Verifica si el ID del usuario está disponible, generalmente se pasa como un campo oculto en el formulario o a través de la URL.
        $idUsuario = $_POST['id']; // Asegúrate de que exista un campo id en tu formulario.

        // Asegúrate de que $idUsuario y $nuevaContraseña no estén vacíos antes de realizar la actualización en la base de datos.
        if (!empty($idUsuario) && !empty($nuevaContraseña)) {
            // Realiza una consulta SQL para actualizar la contraseña del usuario.
            $sql = "UPDATE usuarios SET password = '$nuevaContraseña' WHERE id = $idUsuario";

            // Ejecuta la consulta SQL.
            if (mysqli_query($conexion, $sql)) {
                echo "La contraseña se actualizó correctamente.";
            } else {
                echo "Error al actualizar la contraseña: " . mysqli_error($conexion);
            }
        } else {
            echo "ID de usuario o contraseña no válidos.";
        }
    }

    ?>