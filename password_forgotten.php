

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
        <div class="card__forgo__pass">
            <div class="pass__div--title">
                <h2 class="forgo__pass--title">Recupera tu cuenta</h2>
            </div>

            <form method="post" action="./php/logic/logic_users/sendMail.php">
                <div class="pass__div--input">
                    
                    <p class="forgo__pass--paragraph">Ingresa tu correo electrónico para poder restablecer tu contraseña.</p>
                    <input class="forgo__pass--email" type="email" id="email" name="email" required placeholder="Correo electrónico">
                </div>
                <div class="forgo__div--button">
                    <a href="index.php">
                        <button class="btn__blue forgo__pass--button">
                            <p>Cancelar</p>
                        </button></a>
                   <button class="btn__blue btn__blue-email" type="submit" >Enviar email</button>
                </div>
            </form>

        </div>
    </section>

</body>

</html>



