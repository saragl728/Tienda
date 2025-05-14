<?php
//función que limpia un string
function limpiaEstring($cadena): string
{
    $arrayProhibido = ['cabrón', 'gilipollas', 'puto', 'subnormal', 'travelo']; //array con palabras prohibidas
    $patron = '/';

    for ($i = 0; $i < count($arrayProhibido); $i++){
        if ($i < count($arrayProhibido) - 1){
            $patron .= "$arrayProhibido[$i]|";
        }
        else{
            $patron .= "$arrayProhibido[$i]/i";
        }
    }

    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = preg_replace($patron, '?', $salida);
    $salida = htmlspecialchars($salida);
    return $salida;
}

//para redondear los precios
function redondear($numero): float{
    return round($numero, 2);
}
?>