<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con=retornarConexion();
  
  mysqli_query($con,"insert into carrito(IdCompra, IdProducto, cantidad) values ($params->IdCompra, $params->IdProducto, $params->cantidad)");
    
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';

  require "../req/piePost.php";