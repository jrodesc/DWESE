<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php

//vamos a meter todos los valores en un array y dar el valor de multiplicarlo
function factorial($x) {
    $numbers = [];
    for($i = 1; $i != $x+1; $i++) {
        $numbers[] = $i; 
    }
    return array_product($numbers);
}

?>
<body>
    <form action="ejercicio1.php" method="post">
        <label>Introduzca el valor m:</label>
        <input type="number" min=0 name="m" id="m" required>
        <br>
        <label>Introduzca el valor n:</label>
        <input type="number" min=0 name="n" id="n" required>
        <br>
        <input type="submit" name="calcular" id="calcular" value="calcular">
    </form>

    <?php
    if(isset($_POST["calcular"])) {
        $m = $_POST["m"];
        $n = $_POST["n"];
    }
    $result = factorial($m) / (factorial($n) * factorial($m-$n));
    echo "$result";
    ?>
</body>

</html>