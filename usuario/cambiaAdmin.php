<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  mysqli_query($con,"update usuario set adminis='$params->adminis' where Id=$params->Id");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  require "../req/piePost.php"; 
?>