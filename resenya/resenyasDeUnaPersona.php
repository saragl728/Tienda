<?php
  require "../header.php";
  require "../conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT resenya.Id AS Id, producto.nombre AS producto, resenya.contenido AS opinion, resenya.fecha AS fecha FROM usuario INNER JOIN resenya ON usuario.Id = resenya.IdCliente INNER JOIN producto ON resenya.IdProducto = producto.Id WHERE resenya.IdCliente = $_GET[IdCliente] ORDER BY fecha DESC;");
  require "../req/buscaVarios.php";
?>