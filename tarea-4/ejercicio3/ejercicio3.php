<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio3.php" method="post">
        <label>Escoja el numero de terminos para aproximar Pi:</label>
        <input type="number" id="numero" name="numero" required>
        <br>
        <input type="submit" id="calcular" name="calcular" value="calcular">
    </form>
</body>
<?php

    if(isset($_POST["calcular"])) {
        $n = $_POST["numero"];
        $pi = 0;

        $pi = 4 * sumatoria($n);
        $resultado = sumatoria($n);

        echo "<br>";
        echo "$pi";

    }
    
    function sumatoria($n) {
        $suma = 0;
        for($i = $n; $i>=0; $i-- ) {
            $potencia = pow(-1, $i);
            $division = 1/((2*$i)+1);
            $multiplicacion = $potencia * $division;
            $suma = $suma + $multiplicacion;
        }
        return $suma;
    }
?>
</html>