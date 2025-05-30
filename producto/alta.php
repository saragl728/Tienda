<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre, 30);
  $precioo = redondear($params->precio);

  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from producto where nombre=?");
  $aent->bind_param("s", $noombre);
  require "../req/hazComprobacion.php";

  $sent = mysqli_prepare($con, "insert into producto(nombre,precio) values(?,?)");
  $sent->bind_param("sd", $noombre, $precioo);
  $sent->execute();
    
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';
  require "../req/piePost.php";