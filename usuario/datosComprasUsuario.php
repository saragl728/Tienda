<?php 
  require "../req/header.php";
  require "../req/conexion.php";
  $con=retornarConexion();

  $registros=mysqli_query($con,"SELECT ROUND(SUM(producto.precio * carrito.cantidad), 2) AS 'importe', SUM(carrito.cantidad) AS 'nObjetos', carrito.IdCompra AS 'compra', compra.fecha FROM producto JOIN carrito ON carrito.IdProducto = producto.Id JOIN compra ON carrito.IdCompra = compra.Id WHERE compra.IdCliente = $_GET[Id] GROUP BY carrito.IdCompra ORDER BY compra.fecha DESC;");
  require "../req/buscaVarios.php";