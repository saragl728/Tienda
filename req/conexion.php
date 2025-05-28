<?php
function retornarConexion() {
  $con=mysqli_connect("localhost","root","","tienda");
  return $con;
}