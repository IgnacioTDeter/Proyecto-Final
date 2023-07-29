<?php
    session_start();

    if (isset($_SESSION['user'])) {

        if ($_SESSION['user'] == 'juan123') {
            $msg_welcome = 'Bienvenido ' . $_SESSION['user'];
            $mode = 'Modo: Administrador';
        } else {
            session_destroy();
            $msg_welcome = 'Bienvenido';
            $mode = 'Modo: invitado';
        }
    } else {
        session_destroy();
        $msg_welcome = 'Bienvenido';
        $mode = 'Modo: invitado';
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pañol-tec1-Bienvenido</title>
</head>

<body class="body">




    <h1>PAÑOL TECNICA 1 Vte. López</h1>
    <h2><?php echo $msg_welcome ?></h2>
    <h2><?php echo $mode ?></h2>
    <a href="pages/login.html">Login</a>
    <a href="pages/pedidos.php">Inventario</a> <!--esto tecnicamente te lleva al inventario, como no esta subido nos lleva a los pedidos a modo de ejemplo-->
    <a href="pages/guardar_pedido.php">Guardar pedido</a><!--este formulario tambien funciona a modo de ejemplo ya que no esta subido el final-->
    <a href="php/logout.php">Logout</a>

</body>

</html>