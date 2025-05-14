<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select cantidad from personaTieneObjeto where IdUsuario=$_GET[IdUsuario] AND IdProducto=$_GET[IdProducto]");
  require "../req/buscaUno.php";
?>