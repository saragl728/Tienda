<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

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
mysqli_query($con,"insert into usuario(nombre,correo,fechaNac,contrasenya) values ('$noombre','$correoo', '$fechaNaac', '$passwd')");

class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'datos grabados';

header('Content-Type: application/json');
echo json_encode($response);
?>