<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();
  
  mysqli_query($con,"update usuario set saldo=$params->saldo where Id=$params->Id");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'saldo actualizado';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>