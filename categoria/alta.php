<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();

  $noombre = limpiaEstring($params->nombre, 20);

  //comprobación para ver si ya exuste
  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from categoria where nombre=?");
  $aent->bind_param("s", $noombre);
  require "../req/hazComprobacion.php";

  $sent = mysqli_prepare($con, "insert into categoria(nombre) values(?)");
  $sent->bind_param("s", $noombre);
  $sent->execute();
    
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php";