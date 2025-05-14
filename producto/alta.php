<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);
  $precioo = redondear($params->precio);

  $sent = mysqli_prepare($con, "insert into producto(nombre,precio) values(?,?)");
  $sent->bind_param("sd", $noombre, $precioo);
  $sent->execute();
    
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>