<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
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