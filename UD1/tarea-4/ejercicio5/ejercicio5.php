<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ejercicio5.php" method="post">
        <label>Escoja la masa 1:</label>
        <input type="number" id="m1" name="m1" required>
        <br>
        <label>Escoja la masa 2:</label>
        <input type="number" id="m2" name="m2" required>
        <br>
        <label>Escoja la distancia en m:</label>
        <input type="number" id="r" name="r" required>
        <br>
        <input type="submit" id="calcular" name="calcular" value="calcular">
    </form>
</body>
<?php
    if(isset($_POST["calcular"])) {
        $g = 6.67 * pow(10, -11);
        $m1 = $_POST["m1"];
        $m2 = $_POST["m2"];
        $r = $_POST["r"];
        $f = $g * ($m1 * $m2)/pow($r, 2);
        echo "$f";
    }
?>
</html>