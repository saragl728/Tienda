<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $noombre = limpiaEstring($params->nombre, 30);
  $precioo = redondear($params->precio);

  $sent = mysqli_prepare($con, "insert into producto(nombre,precio) values(?,?)");
  $sent->bind_param("sd", $noombre, $precioo);
  $sent->execute();
    
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';
  require "../req/piePost.php";