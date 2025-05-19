<?php
$arrayProhibido = ['cabrón', 'gilipollas', 'puto', 'subnormal', 'travelo', 'nigg', 'maric']; //array con palabras prohibidas
$patron = '/';
for ($i = 0; $i < count($arrayProhibido); $i++) {
    if ($i < count($arrayProhibido) - 1) $patron .= "$arrayProhibido[$i]|";
    else $patron .= "$arrayProhibido[$i]/i";
}

 /**
  * Función que limpia una cadena de texto cualquiera para evitar inyecciones de código y que se inserten ciertas palabras
  * La función hará un recorte si ciertos cambios hacen que se pase de la longitud máxima
  * @param string $cadena Cadena de texto que se limpiará
  * @param int $longMax Longitud máxima que puede tener
  * @return string Cadena de texto limpiada
  */
 function limpiaEstring(string $cadena, int $longMax): string
{
    global $patron;
    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = preg_replace($patron, '?', $salida);
    $salida = htmlspecialchars($salida);
    if (strlen($salida) > $longMax) $salida = substr($salida, 0, $longMax);
    return $salida;
}

/**
 * Función que limpia un posible correo electrónico para evitar inyecciones de código, que se inserten ciertas palabras y que haya espacios
 * La función usa como variable global un array que se ha definido antes que se usará en una expresión regular para hacer el filtro
 * La función hace que se compruebe si después de hacer la sustitución de caracteres especiales se pasa de la longitud máxima y si se pasa, se hace un recorte
 * @param string $cadena Posible correo electrónico
 * @return string Correo electrónico limpiado
 */
function limpiaCorreo(string $cadena): string {
    global $patron;
    define("LONG_MAX", 200);
    $salida = trim($cadena);
    $salida = stripslashes($salida);
    $salida = preg_replace($patron, '?', $salida);
    $salida = preg_replace("/\s/", '', $salida);   //quito los espacios en blanco
    $salida = htmlspecialchars($salida);
    if (strlen($salida) > LONG_MAX) $salida = substr($salida, 0, LONG_MAX);
    return $salida;
}

/**
 * Función que redondea un número a 2 decimales
 * @param float $numero Número que se le pasa
 * @return float Número redondeado
 */
function redondear(float $numero): float{
    return round($numero, 2);
}
?>