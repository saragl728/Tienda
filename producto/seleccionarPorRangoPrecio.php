<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, precio from producto where precio BETWEEN $_GET[PrecioMin] AND $_GET[PrecioMax] ORDER BY precio DESC");
  require "../req/buscaVarios.php";