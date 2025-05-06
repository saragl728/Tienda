<?php 
  require("../header.php");
  
  require("../conexion.php");
  $con=retornarConexion();
  
  mysqli_query($con, "delete from productoCategoria where IdCat=$_GET[Id]");
  mysqli_query($con,"delete from categoria where Id=$_GET[Id]");  
  
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>