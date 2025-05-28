<?php 
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  //para comprobar si ya existe esta conexión
  $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from productoCategoria where IdProd=? AND IdCat=?");
  $aent->bind_param("ii", $params->IdProd, $params->IdCat);
  require "../req/hazComprobacion.php";

  mysqli_query($con,"insert into productoCategoria(IdProd,IdCat) values ($params->IdProd,$params->IdCat)");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'datos grabados';
  require "../req/piePost.php";