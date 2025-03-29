<?php
//función que limpia un string
function limpiaEstring($cadena): string
{
    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = htmlspecialchars($salida);
    return $salida;
}

//para redondear los precios
function redondear($numero): float{
    return round($numero, 2);
}
?>