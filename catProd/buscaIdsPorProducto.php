<?php
  require("../header.php");

  require("../conexion.php");
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT IdProd, IdCat FROM producto INNER JOIN productoCategoria ON producto.Id = productoCategoria.IdProd WHERE producto.nombre = '$_GET[filtro]' ORDER BY IdCat");
  $vec = [];
  while ($reg = mysqli_fetch_array($registros)) {
    $vec[] = $reg;
  }

  $cad = json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>