<?php
  require "../req/header.php";
  require "../req/conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT resenya.Id AS Id, usuario.nombre AS cliente, producto.nombre AS producto, resenya.contenido AS opinion, resenya.fecha AS fecha FROM usuario INNER JOIN resenya ON usuario.Id = resenya.IdCliente INNER JOIN producto ON resenya.IdProducto = producto.Id WHERE producto.nombre LIKE '%$_GET[nombre]%' ORDER BY fecha DESC");
  require "../req/buscaVarios.php";