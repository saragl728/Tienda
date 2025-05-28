<?php
$vec = [];  //para cuando se hace una consulta de varios
while ($reg = mysqli_fetch_array($registros)) {
    $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');