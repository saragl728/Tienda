<?php 
  require("../header.php");
  require("../conexion.php");
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario where nombre='$_GET[nombre]'");
  require "../req/buscaUno.php";
?>