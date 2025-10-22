<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejercicio5</title>
</head>

<body>
    <form action="index.php" method="post">
        <label>Escoge el primer numerador:</label>
        <input type="number" name="numerador1" id="numerador1" required>
        <br>
        <label>Escoge el primer denominador:</label>
        <input type="number" name="denominador1" id="denominador1" required min=1>
        <br>
        <label>Escoge el segundo numerador:</label>
        <input type="number" name="numerador2" id="numerador2" required>
        <br>
        <label>Escoge el segundo denominador:</label>
        <input type="number" name="denominador2" id="denominador2" required min=1>
        <br>
        <label>Escoge el tipo de operacion que desea realizar: </label>
        <input type="radio"
            id="suma"
            name="operacion"
            value="suma" required>
        <label for="suma">Suma</label>
        <input type="radio"
            id="resta"
            name="operacion"
            value="resta" required>
        <label for="resta">Resta</label>
        <input type="radio"
            id="multiplicacion"
            name="operacion"
            value="multiplicacion" required>
        <label for="multiplicacion">Multiplicacion</label>
        <input type="radio"
            id="division"
            name="operacion"
            value="division" required>
        <label for="division">Division</label>
        <br>
        <input type="submit" name="enviar" id="enviar" value="enviar">

    </form>
    <!--si se introduce num = 4 y denominador = 3 -> 4/3 -->
    <?php
    require_once 'suma.php';
    require_once 'resta.php';
    require_once 'multiplicacion.php';
    require_once 'division.php';
    //pedir dos fracciones(numerador y denominador) mediante un formulario, dar resultado simplificado de
    //suma, resta multiplicacion y division.

    if (isset($_POST["enviar"])) {
        $operacion = $_POST["operacion"];
        $numerador1 = $_POST["numerador1"];
        $numerador2 = $_POST["numerador2"];
        $denominador1 = $_POST["denominador1"];
        $denominador2 = $_POST["denominador2"];

        if ($operacion == "suma") {
            $resultado = suma($numerador1, $denominador1, $numerador2, $denominador2);
        } elseif ($operacion == "resta") {
            $resultado = resta($numerador1, $denominador1, $numerador2, $denominador2);
        } elseif ($operacion == "multiplicacion") {
            $resultado = multiplicacion($numerador1, $denominador1, $numerador2, $denominador2);
        } elseif ($operacion == "division") {
            $resultado = division($numerador1, $denominador1, $numerador2, $denominador2);
        }

        list($num, $den) = $resultado;
        echo "Resultado: $num/$den";
    }
    ?>
</body>

</html>