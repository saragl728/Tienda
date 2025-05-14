<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();
  
  mysqli_query($con,"delete from productoCategoria where IdProd=$_GET[IdProd] and IdCat=$_GET[IdCat]");
  
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>