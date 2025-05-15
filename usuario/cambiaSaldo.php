<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();
  
  mysqli_query($con,"update usuario set saldo=$params->saldo where Id=$params->Id");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'saldo actualizado';

  require "../req/piePost.php";
?>