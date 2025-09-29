<?php
require_once 'suma.php';

function multiplicacion($numerador1, $denominador1, $numerador2, $denominador2) {
    if ($denominador1 == 0 || $denominador2 == 0) {
        throw new Exception("El denominador no puede ser cero");
    }

    $numeradorResult = ($numerador1 * $numerador2);
    $denominadorResult = ($denominador1*$denominador2);

    $divisor = mcd($numeradorResult, $denominadorResult);

    $numSimple = $numeradorResult / $divisor;
    $denSimple = $denominadorResult / $divisor;


    return [$numSimple, $denSimple];
}
?>