<?php
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
$con = retornarConexion();

$noombre = limpiaEstring($params->nombre);

$sent = mysqli_prepare($con, "update categoria set nombre=? WHERE Id=?");
$sent->bind_param("si", $noombre, $params->Id);
$sent->execute();

class Result
{
}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje = 'datos modificados';

header('Content-Type: application/json');
echo json_encode($response);
?>