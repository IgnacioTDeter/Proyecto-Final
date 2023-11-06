<?php
 include ('./php/logic/logic_users/change_password.php'); 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />

    <link rel="shortcut icon" href="assets/icons/logo.png" type="image/x-icon">

    <title>Pañol - Login</title>
</head>

<body>
    <section class="section__container">
        <div class="card_forgo_pass">
            <div class="pass__div--title">
                <h2 class="forgo__pass--title">Nueva Contraseña</h2>
            </div>

            <form method="post" action="" id="resetForm">
                <div class="pass__div--input">
                    <p class="forgo__pass--subtitle">Ingrese su nueva contraseña.</p>
                    <input class="forgo__pass--email" type="password" placeholder="Nueva contraseña" name="password_1">
                    <p class="forgo__pass--subtitle-2">Repita su nueva contraseña.</p>
                    <input class="forgo__pass--email" type="password" placeholder="Nueva contraseña" name="password_2">
                </div>

                <div class="forgo__div--button">
                    <button class="btn_blue forgo_pass--button" type="button" onclick="cancelReset()">
                        <p>Cancelar</p>
                    </button>
                    <a href="../"><input class="btn_blue btn_blue-email" type="submit" value="Cambiar contraseña">
                </div>
            </form>
        </div>
    </section>

    <script>
        function cancelReset() {
            // Cancela la acción por defecto del formulario al hacer clic en "Cancelar".
            window.location.href = '../index.php';
        }
    </script>
</body>

</html>