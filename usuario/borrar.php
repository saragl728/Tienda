<?php
    require("../header.php");

    require("../conexion.php");
    $con = retornarConexion();

    //hay que quitar el carrito también
    mysqli_query($con, "delete from carrito WHERE IdCompra IN (SELECT compra.Id FROM compra WHERE compra.IdCliente = $_GET[Id])");
    mysqli_query($con, "delete from compra where IdCliente$_GET[Id]");
    mysqli_query($con, "delete from personaTieneObjeto where IdUsuario=$_GET[Id]");
    mysqli_query($con, "update resenya SET IdCliente = 0 where IdCliente=$_GET[Id]");
    mysqli_query($con, "delete from usuario where Id=$_GET[Id]");

    class Result
    {
    }

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'usuario borrado';

    header('Content-Type: application/json');
    echo json_encode($response);
?>