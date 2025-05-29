<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario WHERE Id <> $_GET[Id]");
  require "../req/buscaVarios.php";