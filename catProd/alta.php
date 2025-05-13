<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  $con=retornarConexion();

  mysqli_query($con,"insert into productoCategoria(IdProd,IdCat) values ($params->IdProd,$params->IdCat)");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>