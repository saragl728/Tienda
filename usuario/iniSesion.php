<?php
    require("../header.php");

    $json = file_get_contents('php://input');

    $params = json_decode($json);

    require("../conexion.php");
    require("../comun.php");
    $con = retornarConexion();

    $noombre = limpiaEstring($params->nombre);
    $passwd = limpiaEstring($params->contrasenya);

    $sent = mysqli_prepare($con, "select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario where nombre=?");
    $sent->bind_param("s", $noombre);
    $sent->execute();
    $aux = $sent->get_result();

    $resa = mysqli_fetch_assoc($aux);
    $res = $resa;

    //si la contraseña falla, fin del código
     if (!password_verify($passwd, $res["contrasenya"])){
        $response = null;
        echo json_encode($response);
        exit($response);
    } 

    class Usuario{ }
    $response = new Usuario();
    $response->Id = $res["Id"];
    $response->nombre = $res["nombre"];
    $response->correo = $res["correo"];
    $response->fechaNac = $res["fechaNac"];
    $response->saldo = $res["saldo"];
    $response->contrasenya = $res["contrasenya"];
    $response->adminis = $res["adminis"];

    header('Content-Type: application/json');
    echo json_encode($response);
?>