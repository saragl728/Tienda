<?php
require "../req/header.php";
require "../req/conexion.php";
$con = retornarConexion();

$registros = mysqli_query($con, "select Id, nombre, precio from producto WHERE nombre LIKE '%$_GET[nombre]%'");
require "../req/buscaVarios.php";