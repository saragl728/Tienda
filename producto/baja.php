<?php 
require "../req/header.php";
require "../req/conexion.php";
  $con=retornarConexion();
  
  //hay que hacer varias consultas
  mysqli_query($con, "delete from carrito where IdProducto=$_GET[Id]");
  mysqli_query($con, "delete from compra where Id NOT IN (SELECT carrito.IdCompra FROM carrito"); //esto está para borrar compras cuyos carritos se quedan vacíos
  mysqli_query($con, "delete from personaTieneObjeto where IdProducto=$_GET[Id]");
  mysqli_query($con, "delete from resenya where IdProducto=$_GET[Id]");
  mysqli_query($con, "delete from productoCategoria where IdProd=$_GET[Id]");
  mysqli_query($con,"delete from producto where Id=$_GET[Id]");
    
  
  class Result {}

  $response = new Result();
  $response->resultado = 'OK';
  $response->mensaje = 'articulo borrado';

  header('Content-Type: application/json');
  echo json_encode($response);  
?>