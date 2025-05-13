<?php 
  require("../header.php");
  
  require("../conexion.php");
  $con=retornarConexion();

  $registros=mysqli_query($con,"SELECT ROUND(SUM(producto.precio * carrito.cantidad), 2) AS 'importe', SUM(carrito.cantidad) AS 'nObjetos', carrito.IdCompra AS 'compra', compra.fecha FROM producto JOIN carrito ON carrito.IdProducto = producto.Id JOIN compra ON carrito.IdCompra = compra.Id WHERE compra.IdCliente = $_GET[Id] GROUP BY carrito.IdCompra ORDER BY compra.fecha DESC;");
    
  $vec=[];  
  while ($reg=mysqli_fetch_array($registros))  
  {
    $vec[]=$reg;
  }
  
  $cad=json_encode($vec);
  echo $cad;
  header('Content-Type: application/json');
?>