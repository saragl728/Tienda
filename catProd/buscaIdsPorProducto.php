<?php
  require "../req/header.php";
  require "../req/conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT IdProd, IdCat FROM producto INNER JOIN productoCategoria ON producto.Id = productoCategoria.IdProd WHERE producto.nombre = '$_GET[filtro]' ORDER BY IdCat");
  require "../req/buscaVarios.php";
?>