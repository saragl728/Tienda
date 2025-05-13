<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);

  $sent = mysqli_prepare($con, "update usuario set nombre=? where Id=?");
  $sent->bind_param("si", $noombre, $params->Id);
  $sent->execute();
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>