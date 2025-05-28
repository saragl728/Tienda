<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id from compra ORDER BY Id DESC LIMIT 1;");
  require "../req/buscaUno.php";