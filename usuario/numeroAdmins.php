<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select COUNT(*) AS 'cantidad' from usuario where adminis = 'S'");
  require "../req/buscaUno.php";