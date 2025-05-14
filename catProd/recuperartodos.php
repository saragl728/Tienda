<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"select IdProd, IdCat from productoCategoria ORDER BY IdCat");
  require "../req/buscaVarios.php";
?>
