<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Dado el sueldo bruto de un trabajador y su número de hijos, realizar un algoritmo que
calcule los impuestos que debe pagar según la siguiente tabla de tramos: -->

    <form action="ejercicio4.php" method="post">
        <label for="sueldo">Sueldo bruto:</label>
        <input type="number" name="sueldo" id="sueldo" step="0.1">
        <br>
        <label for="hijos">Numero de hijos:</label>
        <input type="number" name="hijos" id="hijos">
        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>

</body>
</html>