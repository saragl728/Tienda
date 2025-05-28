<?php
  require "../req/header.php";
  require "../req/introPost.php";
  require "../req/conexion.php";
  require "../req/comun.php";
  $con = retornarConexion();

  $noombre = limpiaEstring($params->nombre, 50);
  $passwd = limpiaEstring($params->contrasenya, 200);

  $sent = mysqli_prepare($con, "select Id, nombre, correo, fechaNac, saldo, contrasenya, adminis from usuario where nombre=?");
  $sent->bind_param("s", $noombre);
  $sent->execute();
  $aux = $sent->get_result();

  $resa = mysqli_fetch_assoc($aux);
  $res = $resa;

  //si la contraseña falla, fin del código
  if (!password_verify($passwd, $res["contrasenya"])) require "../req/fallo.php";
      
  class Usuario{ }
  $response = new Usuario();
  $response->Id = $res["Id"];
  $response->nombre = $res["nombre"];
  $response->correo = $res["correo"];
  $response->fechaNac = $res["fechaNac"];
  $response->saldo = $res["saldo"];
  $response->contrasenya = $res["contrasenya"];
  $response->adminis = $res["adminis"];

  require "../req/piePost.php";