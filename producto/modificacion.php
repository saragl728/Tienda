<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);
  $precioo = redondear($params->precio);

  $sent = mysqli_prepare($con, "update producto set nombre=?, precio=? WHERE Id=?");
  $sent->bind_param("sdi", $noombre, $precioo, $params->Id);
  $sent->execute();
     
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  require "../req/piePost.php";
?>