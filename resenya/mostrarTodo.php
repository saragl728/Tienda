<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require("../conexion.php");
$con = retornarConexion();

$registros = mysqli_query($con, "SELECT resenya.Id AS Id, usuario.nombre AS cliente, producto.nombre AS producto, resenya.contenido AS opinion, resenya.fecha AS fecha FROM usuario
INNER JOIN resenya ON usuario.Id = resenya.IdCliente INNER JOIN producto ON resenya.IdProducto = producto.Id");
$vec = [];
while ($reg = mysqli_fetch_array($registros)) {
  $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');
?>