<?php 
  require "../header.php";
  require "../conexion.php";
  $con=retornarConexion();
  $registros=mysqli_query($con,"select Id, nombre from categoria where Id=$_GET[Id]");
  require "../req/buscaUno.php";
?>