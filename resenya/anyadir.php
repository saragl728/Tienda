<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();

  $texto = limpiaEstring($params->contenido, 200);
  
  $sent = mysqli_prepare($con, "insert into resenya(IdProducto,IdCliente,contenido) values (?,?,?)");
  $sent->bind_param("iis", $params->IdProducto, $params->IdCliente, $texto);
  $sent->execute();

  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';
  require "../req/piePost.php";