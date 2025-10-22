<?php
require_once 'suma.php';

function division($numerador1, $denominador1, $numerador2, $denominador2) {
    $numeradorResult = ($numerador1 * $denominador2);
    $denominadorResult = ($denominador1*$numerador2);

    $divisor = mcd($numeradorResult, $denominadorResult);

    $numSimple = $numeradorResult / $divisor;
    $denSimple = $denominadorResult / $divisor;

    return [$numSimple, $denSimple];
}
?>