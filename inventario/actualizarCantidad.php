<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_query($con,"update personaTieneObjeto SET cantidad=$params->cantidad WHERE IdUsuario=$params->IdUsuario AND IdProducto=$params->IdProducto");
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>