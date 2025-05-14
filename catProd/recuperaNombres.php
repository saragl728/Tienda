<?php
  require "../req/header.php";
  require "../req/conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT producto.nombre AS producto, categoria.nombre AS categoria FROM producto INNER JOIN productoCategoria ON producto.Id = productoCategoria.IdProd INNER JOIN categoria ON productoCategoria.IdCat = categoria.Id ORDER BY IdCat");
  require "../req/buscaVarios.php";
?>