<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_query($con,"insert into productoCategoria(IdProd,IdCat) values ($params->IdProd,$params->IdCat)");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>