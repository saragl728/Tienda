<?php 
  require "../header.php";
  require "../conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, precio from producto");
  require "../req/buscaVarios.php";
?>

