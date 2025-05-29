<?php
    require "../req/header.php";
    require "../req/conexion.php";
    $con = retornarConexion();

    mysqli_begin_transaction($con);
    try {
        mysqli_query($con, "delete from carrito WHERE IdCompra IN (SELECT compra.Id FROM compra WHERE compra.IdCliente = $_GET[Id])");
        mysqli_query($con, "delete from compra where IdCliente=$_GET[Id]");
        mysqli_query($con, "delete from personaTieneObjeto where IdUsuario=$_GET[Id]");
        mysqli_query($con, "delete from resenya where IdCliente=$_GET[Id]");
        mysqli_query($con, "delete from usuario where Id=$_GET[Id]");
        mysqli_commit($con);
    }
    catch(mysqli_sql_exception $exception){
        mysqli_rollback($con);
        require "../req/fallo.php";
    }

    require "../req/result.php";
    $response->resultado = 'OK';
    $response->mensaje = 'usuario borrado';

    require "../req/piePost.php";