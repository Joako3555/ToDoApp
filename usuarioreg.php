<?php
session_start();
if (!$_SESSION['email']) {
  header("Location: login.html");
  exit();
}
if (isset($_SESSION['email'])) {
  require 'php/conexion.php';
  $sql = "SELECT nombre,correo FROM usuarios WHERE correo = '" . $_SESSION['email'] . "'";
  if (!$resultado = $conexion->query($sql)) {
    //La consulta fallo 
    $error = "Lo sentimos, este sitio web está experimentando problemas.";
  } else {
    if ($resultado->num_rows === 0) {
      //Ese usuario no existe. 
      echo "
  <script>alert('Lo sentimos. El usuario no existe. Inténtelo de nuevo.')</script>
  ";
    } else {
      $datousuario = $resultado->fetch_assoc();
      $nombre = $datousuario['nombre'];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
</body>
</html>