<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  $passwd = password_hash($params->contrasenya, PASSWORD_DEFAULT);

  mysqli_query($con,"update usuario set contrasenya='$passwd' where Id=$params->Id");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos modificados';

  require "../req/piePost.php";