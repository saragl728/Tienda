<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  try {
    mysqli_begin_transaction($con);
    mysqli_query($con, "delete from carrito where IdProducto=$_GET[Id]");
    mysqli_query($con, "delete from compra where Id NOT IN (SELECT carrito.IdCompra FROM carrito)");
    mysqli_query($con, "delete from personaTieneObjeto where IdProducto=$_GET[Id]");
    mysqli_query($con, "delete from resenya where IdProducto=$_GET[Id]");
    mysqli_query($con, "delete from productoCategoria where IdProd=$_GET[Id]");
    mysqli_query($con,"delete from producto where Id=$_GET[Id]");
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