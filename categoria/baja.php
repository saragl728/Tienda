<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  mysqli_begin_transaction($con);
  try{
    mysqli_query($con, "delete from productoCategoria where IdCat=$_GET[Id]");
    mysqli_query($con,"delete from categoria where Id=$_GET[Id]");  
    mysqli_commit($con);
  }
  catch(mysqli_sql_exception $exception){
  mysqli_rollback($con);
  require "../req/fallo.php";
  }
  
  require "../req/result.php";
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  require "../req/piePost.php";