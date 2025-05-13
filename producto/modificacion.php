<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);
  $precioo = redondear($params->precio);

  $sent = mysqli_prepare($con, "update producto set nombre=?, precio=? WHERE Id=?");
  $sent->bind_param("sdi", $noombre, $precioo, $params->Id);
  $sent->execute();
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>