<?php 
  require("../header.php");
  
  require("../conexion.php");
  $con=retornarConexion();

  $registros=mysqli_query($con,"select nombre from categoria");
  $vec=[];  
  while ($reg=mysqli_fetch_array($registros))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>
