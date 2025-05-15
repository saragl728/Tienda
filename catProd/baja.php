<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con = retornarConexion();
  
  mysqli_query($con,"delete from productoCategoria where IdProd=$_GET[IdProd] and IdCat=$_GET[IdCat]");
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  require "../req/piePost.php";
?>