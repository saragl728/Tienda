<?php
$arrayProhibido = ['cabrón', 'gilipollas', 'puto', 'subnormal', 'travelo', 'nigg', 'maric']; //array con palabras prohibidas

//función que limpia un string
function limpiaEstring($cadena): string
{
    global $arrayProhibido;
    $patron = '/';

    for ($i = 0; $i < count($arrayProhibido); $i++) {
        if ($i < count($arrayProhibido) - 1) $patron .= "$arrayProhibido[$i]|";
        else $patron .= "$arrayProhibido[$i]/i";
    }

    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = preg_replace($patron, '?', $salida);
    $salida = htmlspecialchars($salida);
    return $salida;
}

function limpiaCorreo($cadena): string{
    global $arrayProhibido;
    $patron = '/';

    for ($i = 0; $i < count($arrayProhibido); $i++){
        if ($i < count($arrayProhibido) - 1) $patron .= "$arrayProhibido[$i]|";
        else $patron .= "$arrayProhibido[$i]/i";
    }

    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = preg_replace($patron, '?', $salida);
    $salida = preg_replace("/\s/", '', $salida);   //quito los espacios en blanco
    $salida = htmlspecialchars($salida);
    return $salida;
}

//para redondear los precios
function redondear($numero): float{
    return round($numero, 2);
}
?>