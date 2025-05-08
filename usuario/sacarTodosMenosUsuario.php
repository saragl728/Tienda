<?php 
  require("../header.php");
  
  require("../conexion.php");
  $con=retornarConexion();

  $registros=mysqli_query($con,"select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario WHERE Id NOT IN($_GET[Id], 0)");
    
  $vec=[];  
  while ($reg=mysqli_fetch_array($registros))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>