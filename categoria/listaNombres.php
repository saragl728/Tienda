<?php 
  require "../header.php";
  require "../conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select nombre from categoria");
  require "../req/buscaVarios.php";
?>
