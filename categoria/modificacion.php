<?php
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con = retornarConexion();

  $noombre = limpiaEstring($params->nombre, 20);
  $id = $params->Id;

  //comprobación para ver si ya hay otra con el mismo nombre
  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from categoria where nombre=? AND Id != ?");
  $aent->bind_param("si", $noombre, $id);
  require "../req/hazComprobacion.php";

  $sent = mysqli_prepare($con, "update categoria set nombre=? WHERE Id=?");
  $sent->bind_param("si", $noombre, $id);
  $sent->execute();

  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';
  require "../req/piePost.php";
?>