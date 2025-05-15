<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  mysqli_query($con,"insert into compra(IdCliente) values ($params->IdCliente)");
    
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php";
?>