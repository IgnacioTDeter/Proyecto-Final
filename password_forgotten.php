
<?php 

include('../php/connect_bd.php');




// send gmail 



?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Olvidé mi contraseña</title>
</head>
<body>
    <form method="post" action="php/logic/logic_users/sendMail.php">
        <h2>Olvidé mi contraseña</h2>
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <input type="submit" value="Enviar Email">
        </div>
    </form>


    
</body>
</html>