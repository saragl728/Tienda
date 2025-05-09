<?php
    require("../header.php");

    $json = file_get_contents('php://input');

    $params = json_decode($json);

    require("../conexion.php");
    require("../comun.php");
    $con = retornarConexion();

    $noombre = limpiaEstring($params->nombre);
    $correoo = limpiaEstring($params->correo);
    $fechaNaac = $params->fechaNac;
    $passwd = password_hash($params->contrasenya, PASSWORD_DEFAULT);

    //no tengo que poner el rol o el saldo porque tienen valores por defecto
    $sent = mysqli_prepare($con, "INSERT INTO usuario(nombre,correo,fechaNac,contrasenya) values(?,?,?,?)");
    $sent->bind_param("ssss", $noombre, $correoo, $fechaNaac, $passwd);
    $sent->execute();

    class Result
    {
    }

    $response = new Result();
    $response->resultado = 'OK';
    $response->mensaje = 'datos grabados';

    header('Content-Type: application/json');
    echo json_encode($response);
?>