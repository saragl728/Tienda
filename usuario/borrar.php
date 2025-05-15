<?php
    require "../req/header.php";
    require "../req/conexion.php";
    $con = retornarConexion();

    //hay que quitar el carrito también
    mysqli_query($con, "delete from carrito WHERE IdCompra IN (SELECT compra.Id FROM compra WHERE compra.IdCliente = $_GET[Id])");
    mysqli_query($con, "delete from compra where IdCliente$_GET[Id]");
    mysqli_query($con, "delete from personaTieneObjeto where IdUsuario=$_GET[Id]");
    mysqli_query($con, "update resenya SET IdCliente = 0 where IdCliente=$_GET[Id]");
    mysqli_query($con, "delete from usuario where Id=$_GET[Id]");

    require "../req/result.php";
    $response->resultado = 'OK';
    $response->mensaje = 'usuario borrado';

    require "../req/piePost.php";
?>