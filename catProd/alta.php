<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_query($con,"insert into productoCategoria(IdProd,IdCat) values ($params->IdProd,$params->IdCat)");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php";
?>