<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();
  
  $passwd = password_hash($params->contrasenya, PASSWORD_DEFAULT);

  mysqli_query($con,"update usuario set contrasenya='$passwd' where Id=$params->Id");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>