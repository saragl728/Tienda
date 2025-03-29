<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require("../conexion.php");
$con = retornarConexion();


$registros = mysqli_query($con, "SELECT producto.nombre AS producto, categoria.nombre AS categoria FROM producto INNER JOIN productoCategoria ON producto.Id = productoCategoria.IdProd INNER JOIN categoria ON productoCategoria.IdCat = categoria.Id WHERE producto.nombre = '$_GET[filtro]' ORDER BY IdCat");
$vec = [];
while ($reg = mysqli_fetch_array($registros)) {
  $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');
?>