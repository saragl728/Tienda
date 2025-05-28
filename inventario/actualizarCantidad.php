<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_query($con,"update personaTieneObjeto SET cantidad=$params->cantidad WHERE IdUsuario=$params->IdUsuario AND IdProducto=$params->IdProducto");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php";