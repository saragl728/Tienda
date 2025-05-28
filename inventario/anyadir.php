<?php 
  require "../req/header.php";
  require "../req/introPost.php";  
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_query($con,"insert into personaTieneObjeto(IdUsuario,IdProducto,cantidad) values ($params->IdUsuario,$params->IdProducto,$params->cantidad)");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php"; 