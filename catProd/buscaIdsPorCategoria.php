<?php
  require "../req/header.php";
  require "../req/conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT IdProd, IdCat FROM categoria INNER JOIN productoCategoria ON categoria.Id = productoCategoria.IdCat WHERE categoria.nombre = '$_GET[filtro]' ORDER BY IdCat");
  require "../req/buscaVarios.php";