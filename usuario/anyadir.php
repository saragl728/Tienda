<?php
    require "../req/header.php";
    require "../req/introPost.php";
    require "../req/conexion.php";
    require "../req/comun.php";
    $con = retornarConexion();

    $noombre = limpiaEstring($params->nombre, 50);
    $correoo = limpiaCorreo($params->correo);
    $fechaNaac = $params->fechaNac;
    $passwd = password_hash($params->contrasenya, PASSWORD_DEFAULT);

    //no tengo que poner el rol o el saldo porque tienen valores por defecto
    $sent = mysqli_prepare($con, "insert into usuario(nombre,correo,fechaNac,contrasenya) values(?,?,?,?)");
    $sent->bind_param("ssss", $noombre, $correoo, $fechaNaac, $passwd);
    $sent->execute();

    require "../req/result.php";
    $response->resultado = 'OK';
    $response->mensaje = 'datos grabados';
    require "../req/piePost.php";