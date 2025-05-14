<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();

  $noombre = limpiaEstring($params->nombre);

  $sent = mysqli_prepare($con, "insert into categoria(nombre) values(?)");
  $sent->bind_param("s", $noombre);
  $sent->execute();
    
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>