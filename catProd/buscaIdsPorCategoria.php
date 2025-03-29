<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require("../conexion.php");
$con = retornarConexion();

$registros = mysqli_query($con, "SELECT IdProd, IdCat FROM categoria INNER JOIN productoCategoria ON categoria.Id = productoCategoria.IdCat WHERE categoria.nombre = '$_GET[filtro]' ORDER BY IdCat");
$vec = [];
while ($reg = mysqli_fetch_array($registros)) {
  $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');
?>