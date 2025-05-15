<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();
  
  mysqli_query($con, "delete from productoCategoria where IdCat=$_GET[Id]");
  mysqli_query($con,"delete from categoria where Id=$_GET[Id]");  
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  require "../req/piePost.php";
?>