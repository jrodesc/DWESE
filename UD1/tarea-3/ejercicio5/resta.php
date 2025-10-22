<?php
require_once 'suma.php';

function resta($numerador1, $denominador1, $numerador2, $denominador2) {
    if ($denominador1 == 0 || $denominador2 == 0) {
        throw new Exception("El denominador no puede ser cero");
    }

    $minComMul = mcm($denominador1, $denominador2);

    $num1 = $numerador1 * ($minComMul / $denominador1);
    $num2 = $numerador2 * ($minComMul / $denominador2);

    $numAjustado = $num1 - $num2;

    $divisor = mcd($numAjustado, $minComMul);
    $numSimplificado = $numAjustado / $divisor;
    $denSimplificado = $minComMul / $divisor;


    return [$numSimplificado, $denSimplificado];
}
?>