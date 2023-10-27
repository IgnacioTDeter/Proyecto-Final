<?php 


session_start();

if (!isset($_SESSION['user'])) {

  echo '<script>
    alert("Debes iniciar sesión para acceder");
    window.location = "../index.php";
  </script>';


  session_destroy();
  die();
}
?>