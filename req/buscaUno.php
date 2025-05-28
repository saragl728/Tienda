<?php
if ($reg = mysqli_fetch_array($registros)) {
    $vec[] = $reg;
}

$cad = json_encode($vec);
echo $cad;
header('Content-Type: application/json');