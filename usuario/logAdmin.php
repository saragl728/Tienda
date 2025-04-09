<?php 
  header('Access-Control-Allow-Origin: *'); 
  header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
  
  require("../conexion.php");
  require("../comun.php");
  
  $json = file_get_contents('php://input');

  $con=retornarConexion();


  $str = "select adminis FROM usuario WHERE nombre='$_GET[nombre]'";
  $registros=mysqli_query($con,$str);


  if ($reg=mysqli_fetch_array($registros))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>