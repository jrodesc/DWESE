<?php
function mcd($numerador, $denominador) {
    $numerador = abs($numerador);
    $denominador = abs($denominador);

    while ($denominador != 0) {
        $temp = $denominador;
        $denominador = $numerador%$denominador;
        $numerador = $temp;

    }
    return $numerador;
}




function division($numerador1, $denominador1, $numerador2, $denominador2) {

}



?>