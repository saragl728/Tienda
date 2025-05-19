<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre, 30);
  $precioo = redondear($params->precio);
  $id = $params->Id;

  //comprobación para ver si cuando se intenta cambiar el nombre no hay uno con el mismo nombre
  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from producto where nombre=? AND Id != ?");
  $aent->bind_param("si", $noombre, $id);
  require "../req/hazComprobacion.php";

  $sent = mysqli_prepare($con, "update producto set nombre=?, precio=? WHERE Id=?");
  $sent->bind_param("sdi", $noombre, $precioo, $id);
  $sent->execute();
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';
  require "../req/piePost.php";
?>