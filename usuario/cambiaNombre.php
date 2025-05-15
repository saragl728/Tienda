<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre);

  $sent = mysqli_prepare($con, "update usuario set nombre=? where Id=?");
  $sent->bind_param("si", $noombre, $params->Id);
  $sent->execute();
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  require "../req/piePost.php"; 
?>