<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  $con=retornarConexion();
  
  mysqli_query($con,"update usuario set saldo=$params->saldo where Id=$params->Id");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'saldo actualizado';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>