<?php
$aent->execute();
$aux = $aent->get_result();
$resa = mysqli_fetch_assoc($aux);
$res = $resa;

//si la cantidad es mayor que 0, se para el código
if ($res["cantidad"] == 1) {
    $response = null;
    echo json_encode($response);
    exit($response);
}
?>