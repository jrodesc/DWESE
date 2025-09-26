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
        <input type="number" name="hijos" id="hijos" min="0">
        <br>
        <input type="submit" name="enviar" value="enviar">
    </form>



<!--Los impuestos se pagan por tramos, es decir, si el sueldo del trabajador es de 1700, debe
pagar 0% por el primer tramo, 10% de 600,0€ por el segundo tramo y el 15% de 100,0€ por
el tercer tramo-->


<!--Los descuentos por hijo, se entienden como descuentos sobre la cantidad a pagar en cada
tramo, es decir, si en el tercer tramo sale que debe pagar 100,0 y tiene 2 hijos, puede
descontar de esos 100,0 el 2 %, es decir, un 1% por cada hijo según la tabla.-->



<!-- Es decir, si tienes que pagar un 10% de impuestos pero tienes 10 hijos, no pagaras nada.
En caso de pagar un 15% solo pagarias un 5 en el caso de tener 10 hijos.-->
    <?php
    $totalHijos = $_POST["hijos"];
    $sueldoBruto = $_POST["sueldo"];
    $sueldoNeto = 0;

    function calculoImpuestos($sueldoBruto, $totalHijos) {
        $tramos = [];


        $impuesto = 0;
        $ingresoRestante = $sueldoBruto;
        $ingresoAnterior = 0;


        foreach($tramos as $tramo) {
            
        }
    }


    //debemos hacer un echo que nos diga con este sueldo bruto y estos hijos:
    //el sueldo bruto, el neto y dinero a pagar
    //debemos crear una funcion que tome un sueldo neto y un porcentaje y nos retorne el sueldo neto
    ?>
</body>
</html>