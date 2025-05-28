<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario where Id=$_GET[Id]");
  require "../req/buscaUno.php";