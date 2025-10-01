<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio4.php" method="post">
        <label>Escoja el numero de terminos para calcular la serie:</label>
        <input type="number" id="numero" name="numero" required min = >
        <br>
        <input type="submit" id="calcular" name="calcular" value="calcular">
    </form>
</body>

<?php
    if(isset($_POST["calcular"])) {
        $n = $_POST["numero"];

        echo serializacion($n);


    }

    function serializacion($n) {
        if($n == 1) {
            return 1;
        } elseif($n == 2) {
            return 2;
        } else {
            return serializacion($n-2) + serializacion($n-1);
        }
    }

?>
</html>