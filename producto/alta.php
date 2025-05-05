<?php 
  require("../header.php");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);
  $precioo = redondear($params->precio);

  mysqli_query($con,"insert into producto(nombre,precio) values ('$noombre',$precioo)");
    
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>