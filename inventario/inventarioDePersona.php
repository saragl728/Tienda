<?php
  require "../header.php";
  require "../conexion.php";
  $con = retornarConexion();

  $registros = mysqli_query($con, "SELECT producto.nombre AS 'producto', personaTieneObjeto.cantidad AS 'cantidad' FROM personaTieneObjeto JOIN producto ON personaTieneObjeto.IdProducto = producto.Id WHERE personaTieneObjeto.IdUsuario = $_GET[IdPer]");
  require "../req/buscaVarios.php";
?>