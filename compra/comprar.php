<?php 
  require("../header.php");
  require("../introPost.php");
  require("../conexion.php");
  require("../comun.php");
  $con=retornarConexion();
  
  //la fecha de transacción es current_date
  mysqli_query($con,"insert into compra(IdCliente) values ($params->IdCliente)");
    
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>