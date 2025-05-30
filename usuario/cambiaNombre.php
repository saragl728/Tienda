<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre, 50);
  $id = $params->Id;

  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from usuario where nombre=? AND Id != ?");
  $aent->bind_param("si", $noombre, $id);
  require "../req/hazComprobacion.php";

  $sent = mysqli_prepare($con, "update usuario set nombre=? where Id=?");
  $sent->bind_param("si", $noombre, $id);
  $sent->execute();
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';
  require "../req/piePost.php"; 