<?php 
  require("../header.php");
  
  $json = file_get_contents('php://input');
 
  $params = json_decode($json);
  
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();

  $texto = limpiaEstring($params->contenido);
     
  $sent = mysqli_prepare($con, "insert into resenya(IdProducto,IdCliente,contenido) values (?,?,?)");
  $sent->bind_param("iis", $params->IdProducto, $params->IdCliente, $texto);
  $sent->execute();

  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>