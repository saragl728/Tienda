<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  
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