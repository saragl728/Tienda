<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select COUNT(*) AS 'cantidad' from usuario");
  require "../req/buscaUno.php";