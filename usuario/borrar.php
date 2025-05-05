<?php
    require("../header.php");

    require("../conexion.php");
    $con = retornarConexion();

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