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

    //se comprueba si el nombre o el correo ya existen
    $aent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from usuario where nombre=?");
    $aent->bind_param("s", $noombre);
    require "../req/hazComprobacion.php";

    $eent = mysqli_prepare($con, "select COUNT(*) AS 'cantidad' from usuario where correo=?");
    $eent->bind_param("s", $correoo);
    $eent->execute();
    $aud = $eent->get_result();
    $rese = mysqli_fetch_assoc($aud);
    $ret = $rese;
    if ($ret["cantidad"] == 1) require "../req/fallo.php";

    //no tengo que poner el rol o el saldo porque tienen valores por defecto
    $sent = mysqli_prepare($con, "insert into usuario(nombre,correo,fechaNac,contrasenya) values(?,?,?,?)");
    $sent->bind_param("ssss", $noombre, $correoo, $fechaNaac, $passwd);
    $sent->execute();

    require "../req/result.php";
    $response->resultado = 'OK';
    $response->mensaje = 'datos grabados';
    require "../req/piePost.php";