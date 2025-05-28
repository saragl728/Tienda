<?php
require "../req/header.php";
require "../req/conexion.php";

$con = retornarConexion();
$registros = mysqli_query($con, "select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario where correo='$_GET[correo]'");
require "../req/buscaUno.php";